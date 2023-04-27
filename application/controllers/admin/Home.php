<?php
defined('BASEPATH') OR exit ('No direct script access allowed');



class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
        $this->load->model('Admin_model');
        $this->load->model('Category_model');
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
    }
    public function index() {
        $data['countCategory'] = $this->Category_model->countCategory();
        $data['countProduct'] = $this->Product_model->countProduct();
        $data['countUser'] = $this->User_model->countUser();
        $data['countOrders'] = $this->Order_model->countOrders();
        $data['countPendingOrders'] = $this->Order_model->countPendingOrders();
        $data['countDeliveredOrders'] = $this->Order_model->countDeliveredOrders();
        $data['countRejectedOrders'] = $this->Order_model->countRejectedOrders();

        $catReport = $this->Admin_model->getCatReport();
        $data['catReport'] = $catReport;

        $proReport = $this->Admin_model->productReport();
        $data['proReport'] = $proReport;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/partials/footer');
    }

    public function CatReport() {
        $catReport = $this->Admin_model->getCatReport();
        $data['catReport'] = $catReport;
        $this->load->view('admin/reports/cat_report', $data);
    }
    
    public function productReport() {
        $proReport = $this->Admin_model->productReport();
        $data['proReport'] = $proReport;
        $this->load->view('admin/reports/product_report', $data);
    }

    public function usersReport() {
        echo "user";
    }

    public function ordersReport() {
        $catReport = $this->Admin_model->getCatReport();
        $data['catReport'] = $catReport;

        $this->load->view('admin/partials/header');
        $this->load->view('admin/reports/cat_report', $data);
        $this->load->view('admin/partials/footer');
    }
    public function generate_pdf($id) {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('www.foodienator.com');
        $pdf->SetTitle('Report');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);

        if($id == 1) {
            $catReport = $this->Admin_model->getCatReport();
            $this->table->set_heading('Id', 'Category', 'Total-sales');
            foreach ($catReport as $cr):
                $this->table->add_row($cr->category_id, $cr->category_name, $cr->price);
            endforeach; 

        } else if($id == 2) {
            $this->table->set_heading('Id', 'Product name', 'total number of times product ordered');
            $proReport = $this->Admin_model->productReport();
            foreach ($proReport as $pr):
                $this->table->add_row($pr->product_id, $pr->product_name, $pr->qty);
            endforeach;
            
        } else {
            redirect(base_url(). 'admin/home');
        }
        
        
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'I');
    }
}
