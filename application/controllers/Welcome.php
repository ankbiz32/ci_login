<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->session->user) {
			return redirect(base_url() . 'profile');
		} else {
			$this->load->view('login');
		}
	}

	public function login_auth()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$user = $this->authModel->get_user($data);
			if ($user) {
				$this->session->set_userdata('user', $user);
				redirect(base_url() . 'profile');
			} else {
				$this->session->set_flashdata('error', 'Invalid credentials');
				return redirect(base_url() . 'login');
			}
		} else {
			$this->session->set_flashdata('validation_errors', validation_errors());
			return redirect(base_url() . 'login');
		}
	}

	public function register()
	{
		if ($this->session->user) {
			return redirect(base_url() . 'profile');
		} else {
			$this->load->view('register');
		}
	}

	public function reg_submit()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]');

		if ($this->form_validation->run() == TRUE) {
			$data['email'] = $this->input->post('email');
			$data['password'] = md5($this->input->post('password'));
			$data['contact'] = $this->input->post('contact');
			$data['name'] = $this->input->post('name');
			$data['hash'] = md5($this->input->post('email'));
			$user = $this->authModel->reg_user($data);
			if ($user) {
				$this->session->set_flashdata('success', 'Successfully registered! Please check your e-mail for the verification link.');
				if($this->sendMail($data['email'],$data['hash']) == 'success'){
					$this->session->set_flashdata('error', 'Internal server error');
				}
				redirect(base_url() . 'register');
			} else {
				$this->session->set_flashdata('error', 'Internal server error');
				return redirect(base_url() . 'register');
			}
		} else {
			$this->session->set_flashdata('validation_errors', validation_errors());
			return redirect(base_url() . 'register');
		}
	}

	public function verify_email($hash = null)
	{
		if ($this->authModel->verify_email($hash)) {
			echo "Email verified <br><br><a href=" . base_url('login') . ">Login to continue</a>";
		} else {
			echo "Cannot verify. Some error occured. <br><br> Please contact support.";
		}
	}

	public function profile()
	{
		if ($this->session->user) {
			$this->load->view('profile');
		} else {
			return redirect(base_url() . 'login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect(base_url() . 'login');
	}

	function sendMail($to, $hash)
	{
		$this->load->library('mail');

		$mail = $this->mail->load();

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'ankur.agr32@gmail.com';
		$mail->Password = 'cnkryzpceidswxzk';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('CI@example.com', 'Ankur');
		$mail->addAddress($to);
		$mail->Subject = 'Email verification link from CI example';
		$mail->isHTML(true);
		$mailContent = '<h4>Click on the below link to verify your email</h4>
		<h3><a href="'.base_url('verify/').$hash.'">Click here</a></h3>
			<h5 style="text-align-center">OR</h5>
			<p>Copy the below code and paste it in your browser:</p>
			<p>'.base_url('verify/').$hash.'<p>';
		$mail->Body = $mailContent;

		if (!$mail->send()) {
			return $mail->ErrorInfo;
		} else {
			echo 'success';
		}
	}
}
