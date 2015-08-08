
$(document).ready(function(){

       $.ajax({
              url: "class_names/all_class.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("student_classes"); 
			
			  for(var key in obj)
			  {
			 
				var val = obj[key];
				var opt = document.createElement('option');
				opt.value = key;
				opt.innerHTML = obj[key];
				objs.appendChild(opt);
			}
			  
			Main.init();
			FormElements.init();
				
			}
        });
        $.ajax({
              url: "students/student_status.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("student_status"); 
			
			  for(var key in obj)
			  {
			 
				var val = obj[key];
				var opt = document.createElement('option');
				opt.value = key;
				opt.innerHTML = obj[key];
				objs.appendChild(opt);
			}
			  
			Main.init();
			FormElements.init();
				
			}
        })
    })
			