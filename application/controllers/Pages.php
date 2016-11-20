<?php

class Pages extends CI_Controller{
  
  public function view($page = 'home'){
    
    //Check that requested page exists
    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
      //CI function that renders default error page
      show_404();
    }
    
    //assign title, capitalize first letter
    $data['title'] = ucfirst($page);
    
    //load head, page, and footer
    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer', $data);
    
    
    
  }
  
}