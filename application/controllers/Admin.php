<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Admin extends CI_Controller
  {
    public function index()
    {
      $this->form_validation->set_rules('username', 'Username', 'required|alpha');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
      if ($this->form_validation->run()) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('LoginModel');
        $user_id = $this->LoginModel->is_authenticate($username,$password);
        if ($user_id) {
          $this->session->set_userdata('id',$user_id);
          return redirect('Admin/success');
        }
        else {
          $this->session->set_flashdata('login_faild','!Invalid username/password');
          return redirect('Admin/index');
        }
      }
      else {
        $this->load->view('admin/login');
      }
    }
    public function success()
    {
      $id = $this->session->userdata('id');
      if (!$id) {
        $this->load->view('admin/login');
      }
      else {
        //pagination
        $this->load->model('ArticleModel');
        $this->load->library('pagination');
        $config=[
          'base_url' => base_url('Admin/success'),
          'per_page' => 2,
          'total_rows' => $this->ArticleModel->total_rows(),
          'full_tag_open' => "<ul class='pagination'>",
          'full_tag_close' => '</ul>',
          'prev_tag_open' => '<li>',
          'prev_tag_close' => '</li>',
          'next_tag_open' => '<li>',
          'next_tag_close' => '</li>',
          'num_tag_open' => '<li>',
          'num_tag_close' => '</li>',
          'cur_tag_open' => '<li class="active"></li><a>',
          'cur_tag_close' => '</a></li>'
        ];
        $this->pagination->initialize($config);

        $articles = $this->ArticleModel->get_articles($config['per_page'],$this->uri->segment(3));
        $this->load->view('admin/admin-dashboard',['articles'=>$articles]);
      }
    }
    public function register()
    {
      $this->load->view('admin/registeration');
    }
    public function send()
    {
      $this->form_validation->set_rules('first_name', 'firstname', 'required|alpha');
      $this->form_validation->set_rules('last_name', 'lastname', 'required|alpha');
      $this->form_validation->set_rules('email', 'email', 'required|valid_emails|is_unique[users.email]');
      $this->form_validation->set_rules('username', 'Username', 'required|alpha');
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[12]');
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
      if ($this->form_validation->run())
      {
        $post_data = $this->input->post();
        $this->load->model('LoginModel');
        if ($this->LoginModel->create($post_data)) {
          $this->session->set_flashdata('add_art_sucess','!You have Registered successfully...');
          return redirect('Admin/register');
        }
        else {
          $this->session->set_flashdata('add_art_error','!Something is weong please try again...');
          return redirect('Admin/register');
        }

        // $fname = $this->input->post('firstname');
        // $lname = $this->input->post('lastname');
        // $email = $this->input->post('email');
        // $username = $this->input->post('username');
        // $password = $this->input->post('password');
        //
        // $this->load->library('email');
        //
        // $this->email->from('developer.dh.95@gmail.com', 'developer');
        // $this->email->to(set_value('email '));
        //
        // $this->email->subject('Registration');
        // $this->email->message('Registration is successfull. Please check your email');
        // $this->email->set_newline('\n\n');
        //
        // if (!$this->email->send()) {
        //   show_error($this->email->print_debugger());
        // }
        // else {
        //   echo "email sent...";
        // }
      }
      else {
        $this->load->view('admin/registeration',compact('error_upload'));
      }
    }
    public function logout()
    {
      $this->session->unset_userdata('id');
      $this->load->view('admin/login');
    }
    public function addUser()
    {
      $this->load->view('admin/add_articles');
    }
    public function create_article()
    {
      if ($this->form_validation->run('add_articles_rules')) {
        if (!empty($_FILES['img']['name'])) {
          $config = [
            'upload_path' => './upload/',
            'allowed_types'  => 'gif|jpg|png'
          ];

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ($this->upload->do_upload('img')) {
            $data = $this->upload->data();
            $img_path = base_url("upload/".$data['raw_name'].$data['file_ext']);
          }
          else {
            $img_path = '';
          }
        }
        else {
          $img_path = '';
        }

        $post_data = array(
          'article_title' => $this->input->post('article_title'),
          'article_body' => $this->input->post('article_body'),
          'user_id' => $this->input->post('user_id'),
          'img' => $img_path
        );

          $this->load->model('ArticleModel');
          if ($this->ArticleModel->create($post_data)) {
            $this->session->set_flashdata('add_art_sucess','!Article successfully created...');
            return redirect('Admin/success');
          }
          else {
            $this->session->set_flashdata('add_art_error','!Something is weong please try again...');
            return redirect('Admin/success');
          }
        }
        else {
          //$upload_error = $this->upload->display_errors();
          $this->load->view('admin/add_articles',compact('error_upload'));
        }
    }
    public function signup()
    {
      $this->load->view('admin/login');
    }
    public function delete_article($article_id)
    {
      $this->load->model('ArticleModel');
      if ($this->ArticleModel->delelete($article_id)) {
        $this->session->set_flashdata('add_art_sucess','!Article successfully deleted...');
        return redirect('Admin/success');
      }
      else {
        $this->session->set_flashdata('add_art_error','!Something is weong please try again...');
        return redirect('Admin/success');
      }
    }
    public function update_article($article_id)
    {
      $this->load->model('ArticleModel');
      $data = $this->ArticleModel->get_data_byId($article_id);
      $this->load->view('admin/edit_article',['article'=>$data]);
    }
    public function edit_article($article_id)
    {
      if ($this->form_validation->run('add_articles_rules')) {
        $post_data = $this->input->post();
        $this->load->model('ArticleModel');
        if ($this->ArticleModel->update($article_id,$post_data)) {
          $this->session->set_flashdata('add_art_sucess','!Article successfully updated...');
          return redirect('Admin/success');
        }
        else {
          $this->session->set_flashdata('add_art_error','!Something is weong please try again...');
          return redirect('Admin/success');
        }
      }
      else {
        $this->load->view('admin/edit_article');
      }
    }
  }
?>
