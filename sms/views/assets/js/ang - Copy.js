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
              url: "class_names/all_teachers.txt",
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
              url: "class_names/all_class_group.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("asgn_cls"); 
			
			  for(var key in obj)
			  {
				var val = obj[key];
				
				values = val.split('-');
				
				group = values[0];
				
				
    
			$group.append($('<option />', {
			text: values[1],
			value: values[1]
		}));
				
				var opt = document.createElement('option');
				opt.value = key;
				opt.innerHTML = obj[key];
				//objs.appendChild(opt);
				
				
				 var $option = $(this),
				 values = $option.text().split('-');
				//alert(values);
				
				if (group != prevGroup) {
				$group = $('<optgroup />', { label: group }).appendTo('#asgn_cls');
				}
					
				
			  }
			  
			  
			  
			//Main.init();
			//FormElements.init();
				
			}
			
				
        });
					var prevGroup, $group = $();
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
			  
			//Main.init();
			//FormElements.init();
				
			}
        });
		
		
		
		
		$.ajax({
              url: "class_names/all_teachers.txt",
              type: 'GET',
              dataType: 'html',
			  success: function (data) {
			  obj = JSON && JSON.parse(data) || $.parseJSON(data);
			  var objs=document.getElementById("teacher"); 
			  	var i=0;
			  for(var key in obj)
			  {
				var val = obj[key];
				var prevGroup, $group = values;
				
				var $option = $(this),
				values = val.split(' - '),
				
				group = values[0];
				alert(prevGroup);
				if (group != prevGroup) {
					
				$group = $('<optgroup />', { label: group }).appendTo('#teacher');
				$group.append($('<option />', {
				text: values[1],
				value: values[1]
								}));
				}else{
					
					$group = $('<optgroup />', { label: group }).appendTo('#teacher');
				$group.append($('<option />', {
				text: values[1],
				value: values[1]
								}));
					
				}
			
				
    
			prevGroup = group;
//});
					
				
			  }
			  
			  
			  
			//Main.init();
			//FormElements.init();
				
			}
			
				
        });
		

});
