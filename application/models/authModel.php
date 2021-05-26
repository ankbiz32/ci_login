<?php
defined('BASEPATH') or exit('No direct script access allowed');

class authModel extends CI_Model
{

    public function get_user($data = null)
    {
        return $this->db->where('email', $data['email'])
            ->where('password', md5($data['password']))
            ->where('is_verified', 1)
            ->get('users')->row();
    }

    public function reg_user($data = null)
    {
        if ($this->db->insert('users', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function verify_email($hash)
    {
        $user = $this->db->where('hash', $hash)->where('is_verified', 0)->get('users')->row();
        if($user){
            $flag = $this->db->where('id',$user->id)->update('users',['is_verified'=>1]);
            if($flag){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}
