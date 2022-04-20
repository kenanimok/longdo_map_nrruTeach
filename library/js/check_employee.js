
function submit_click(obj,s)
{
	if(s=='Department' & document.AddEmployee.Department.value!='<?=Department?>')
	{ 
		obj.action=""; 
		obj.submit(); 
	}
}
