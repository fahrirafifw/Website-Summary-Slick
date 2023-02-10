<?php


class Alat_model extends CI_Model
{

public function getData()
	{
$sql = 
"SELECT distinct cust.CUST_NAME, cust.CUST_NO, OFFICE_NAME, EMP_NAME, CAST(GO_LIVE_DT AS DATE) as GO_LIVE_DT, AGRMNT_NO, ket
from (
SELECT distinct cdc.cust_no, cdc.ket
from (
SELECT cust_no
from CIF_Data_P
where ket = 1
group by cust_no )sumber
left join CIF_Data_P cdc on cdc.cust_no = sumber.cust_no)ok
left join cust cust with(nolock) on cust.CUST_NO = ok.cust_no
left join AGRMNT agr on agr.CUST_ID = cust.CUST_ID
left join CUST_PERSONAL cp on cp.CUST_ID = cust.CUST_ID
left join REF_OFFICE ro on ro.REF_OFFICE_ID = agr.REF_OFFICE_ID
left join app app with(nolock) on app.APP_ID = agr.APP_ID
left join APP_OTHER_INFO aoi with(nolock) on aoi.APP_ID = app.APP_ID
left join EMP_POSITION ep with(nolock) on ep.EMP_POSITION_ID = MARKETING_ID
left join REF_EMP re with(nolock) on re.REF_EMP_ID = ep.REF_EMP_ID
where agr.CONTRACT_STAT in ('LIV','ICP') and cust.CUST_TYPE='P'-- and ket = 1 and cust.cust_name ='IRMAWATI'
";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function getDataReport()
	{
$sql = "SELECT distinct cust.CUST_NAME, cust.CUST_NO, OFFICE_NAME, EMP_NAME, CAST(GO_LIVE_DT AS DATE) as GO_LIVE_DT, AGRMNT_NO
from (
SELECT distinct cdc.cust_name, cdc.ket
from (
SELECT max(ket) as JUM, cust_name 
from CIF_Data_CV 
group by cust_name )sumber
left join CIF_Data_CV cdc on cdc.cust_name = sumber.cust_name and cdc.ket = sumber.JUM)ok
left join cust cust with(nolock) on cust.CUST_NAME = ok.cust_name
left join AGRMNT agr on agr.CUST_ID = cust.CUST_ID
left join CUST_COY_SHAREHOLDER asi on asi.CUST_ID = cust.CUST_ID
left join CUST_PERSONAL cp on cp.CUST_ID = cust.CUST_ID
left join REF_OFFICE ro on ro.REF_OFFICE_ID = agr.REF_OFFICE_ID
left join app app with(nolock) on app.APP_ID = agr.APP_ID
left join APP_OTHER_INFO aoi with(nolock) on aoi.APP_ID = app.APP_ID
left join EMP_POSITION ep with(nolock) on ep.EMP_POSITION_ID = MARKETING_ID
left join REF_EMP re with(nolock) on re.REF_EMP_ID = ep.REF_EMP_ID
where agr.CONTRACT_STAT in ('LIV','ICP') and cust.CUST_TYPE='C' --and MR_JOB_POSITION = 'D'
";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
public function getDataCV()
	{
$sql = 
"SELECT distinct sumberX.CUST_NAME, c2.CUST_NO, c2.NPWP, cust.CUST_NAME as SUSUNAN_PENGURUS
from (
select sumber.CUST_NAME
from (
select distinct c.CUST_NO, c.CUST_NAME
from AGRMNT agr
left join cust c on c.CUST_ID = agr.CUST_ID
where c.CUST_TYPE='C' and agr.CONTRACT_STAT in ('LIV','ICP')-- and CUST_NAME = 'CAPITAL PROTECH SYNERGY, PT'
) sumber
group by CUST_NAME--, CUST_NO
having count(sumber.CUST_NAME)>1)sumberX
left join cust c2 on c2.cust_name = sumberX.CUST_NAME
left join CUST_PERSONAL cp on cp.CUST_ID = c2.CUST_ID
inner join AGRMNT agr2 on agr2.CUST_ID = c2.CUST_ID
left join (select max(CUST_COY_SHAREHOLDER_ID) as CUST_COY_SHAREHOLDER_ID, ccs2.CUST_ID
			from CUST_COY_SHAREHOLDER ccs2
			left join cust c2 on c2.CUST_ID = ccs2.CUST_ID
			where MR_JOB_POSITION = 'D' and c2.CUST_TYPE = 'C'
			group by ccs2.CUST_ID)ok1 on ok1.CUST_ID = c2.CUST_ID
left join CUST_COY_SHAREHOLDER ccs on ccs.CUST_COY_SHAREHOLDER_ID = ok1.CUST_COY_SHAREHOLDER_ID
left join cust cust on cust.CUST_ID = ccs.SHAREHOLDER_ID
left join cust cust1 on cust1.CUST_ID = ccs.CUST_ID
where agr2.CONTRACT_STAT in ('LIV','ICP') 

";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getDataCIF()
	{
$sql = 
"SELECT sumberX.CUST_NAME, ID_NO,  BIRTH_DT, MOTHER_MAIDEN_NAME, c2.CUST_NO
from (
select sumber.CUST_NAME
from (
select distinct c.CUST_NO, c.CUST_NAME
from AGRMNT agr
left join cust c on c.CUST_ID = agr.CUST_ID
where c.CUST_TYPE='P' and agr.CONTRACT_STAT in ('LIV','ICP') 
--and CUST_NAME='IRMAWATI'
) sumber
--where sumber.CUST_NAME='DEDI DAMHUDI'
group by CUST_NAME--, CUST_NO
having count(sumber.CUST_NAME)>1)sumberX
left join cust c2 on c2.cust_name = sumberX.CUST_NAME
left join CUST_PERSONAL cp on cp.CUST_ID = c2.CUST_ID
inner join AGRMNT agr2 on agr2.CUST_ID = c2.CUST_ID
where agr2.CONTRACT_STAT in ('LIV','ICP') 
";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getDataCabang()
	{
$sql = 
"SELECT * FROM REF_OFFICE
";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function hapus(){
		$this->db->empty_table('CIF_Data_P');
	}
	
	public function hapus2(){
		$this->db->empty_table('CIF_Data_CV');
	}
	
	public function create($dataku)
	{
		
		if($dataku) {
			$insert = $this->db->insert('CIF_Data_P', $dataku);
			return ($insert == true) ? true : false;
		}
	}
	public function create2($dataku)
	{
		if($dataku) {
			$insert = $this->db->insert('CIF_Data_CV', $dataku);
			return ($insert == true) ? true : false;
		}
	}
}
