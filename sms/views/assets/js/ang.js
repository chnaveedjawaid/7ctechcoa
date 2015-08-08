$(document).ready(function(){

       $.ajax({
              url: "class_names/all_class.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("classes"); 
			
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
              url: "teacher_info/all_teachers.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("teacher"); 
			
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
              url: "teacher_info/all_teachers.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			 
			//alert(data);

			for(var key in obj)
			  {
			
				//$( "#staff" ).append( $( '<tr><td>'+obj[key]+'</td><td>45425</td><td>Active</td><td><a href="#" class="edit-row">Edit</a></td><td><a href="#" class="delete-row">Delete</a></td></tr>' ) );
				
			
				}
			  
		
				
			}
        });
		
		
		$.ajax({
              url: "teacher_info/2.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("teacher"); 
			
			  for(var key in obj)
			  {
				
				if(key=='Full Name'){
					  
					  var name = obj[key];
					  $("#name").html(name);
					  }
				if(key=='payment'){
					  
					  var payment = obj[key];
					  $("#payment").html(payment);
					  }	  
			}
			  
		
				
			}
        });
		
		
		
		
		
		 $.ajax({
              url: "class_names/all_class.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("asgn_cls"); 
			
			  for(var key in obj)
			  {
			 
				var val = obj[key];
				var opt = document.createElement('option');
				opt.value = key;
				opt.innerHTML = obj[key];
				objs.appendChild(opt);
			}
			  
			
				
			}
        });		var prevGroup, $group = $();
					$('#asgn_cls option').remove().each(function() {
					var $option = $(this),
					values = $option.text().split(' - '),
					group = values[0];
					});
		
		

		
		$.ajax({
              url: "class_names/all_subject.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("subject"); 
			
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
              url: "teacher_info/2.txt",
              type: 'GET',
              dataType: 'html',
			success: function (data) {
				obj = JSON && JSON.parse(data) || $.parseJSON(data);
				for(var key in obj)
			  {
				  
				  var val = obj;
				  if(key=='Full Name'){
					  
					  var name = obj[key];
					  $("#name").html(name);
					  }
				   if(key=='Teacher ID'){
					  
					  var id = obj[key];
					  $("#id").html(id);
					  }	 
					if(key=='DOB'){
					  
					  var dob = obj[key];
					  $("#DOB").html(dob);
					  }			
				  
				  if(key=='Gender'){
					  
					  var gender = obj[key];
					  $("#gender").html(gender);
					  }		
				  if(key=='Contact'){
					  
					  var cont = obj[key];
					  $("#contact").html(cont);
					  }		  
				  if(key=='Email'){
					  
					  var email = obj[key];
					  $("#email").html(email);
					  }	
				 
				 
					if(key=='image'){
					  
					  var image = obj[key];
					  $("#img").html(image);
					  $('img').attr('src', image);
					  }	
				
					  
			  }
				
				
			}})
		
		
		$.ajax({
              url: "teacher_info/all_teacher.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  //obj = JSON && JSON.parse(data) || $.parseJSON(data);
			 
			//alert(data);
		}})

});
