<?php

class API extends CI_Controller {

	public function getProvinces()
	{
		$regionId = $this->input->get('region_id');
		$provinces =  $this->db->from('tblProvince')->where('strRegCode', $regionId)->get();

		echo json_encode($provinces->result());
	}

	public function getCity()
	{
		$provinceId = $this->input->get('province_id');
		$city = $this->db->from('tblCity')->where('strProvCode', $provinceId)->get();

		echo json_encode($city->result());
	}

	public function getBarangay()
	{
		$cityId = $this->input->get('city_id');
		$barangay = $this->db->from('tblBarangay')->where('strCityMunCode', $cityId)->get();

		echo json_encode($barangay->result());
	}
}