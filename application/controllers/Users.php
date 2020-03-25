<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Users extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model','user');
      $this->load->model('Ajax_model','ajax');
    }
    public function index()
    {
      $this->load->view('users/article_list');
    }
    public function view_feedbaks()
    {
      $data['title'] = "Display Feedback Data";
      $data['feedbackInfo'] = $this->user->get_feedbacks();

      $this->load->view('users/feedback',$data);
    }
    public function createCSV()
    {
      $this->load->library('excel');
      $obj = new PHPExcel();

      $obj->setActiveSheetIndex(0);

      $table_col = array('Name','Email','Feedback');

      $col = 0;

      foreach ($table_col as $field) {
        $obj->getActiveSheet()->setCellValueByColumnAndRow($col,1,$field);
        $col++;
      }

      $feedbackInfo = $this->user->get_feedbacks();

      $excel_row = 2;

      foreach ($feedbackInfo as $row) {
        $obj->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row->name);
        $obj->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row->email);
        $obj->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row->feedbak);
        $excel_row++;
      }

      $obj_writer = PHPExcel_IOFactory::createWriter($obj,'Excel5');
      header('Content-Type:application/vnd.ms-excel');
      header('Content-Disposition:attachment;filename="feedbak.xls"');
      $obj_writer->save('php://output');
    }
    public function view_ajax()
    {
      $data['country'] = $this->ajax->fatch_countries();
      $this->load->view('users/ajax_view',$data);
    }
    public function fatch_states()
    {
      $country_id = $this->input->post('country_id');
      if ($country_id) {
        echo $this->ajax->fatch_states($country_id);
      }
    }
    public function fatch_city()
    {
      $state_id = $this->input->post('state_id');
      if ($state_id) {
        echo $this->ajax->fatch_city($state_id);
      }
    }
  }
?>
