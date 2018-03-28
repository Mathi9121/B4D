<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	
</head>
<body>

</body>
</html>
<?php
$dir = 'images/*.{jpg,jpeg,gif,png}';
			$files = glob($dir,GLOB_BRACE);
			  
			echo 'Listing des images du repertoire miniatures <br />';
			foreach($files as $image)
			{ 
			   $f= str_replace($dir,'',$image);
			   echo $f.'<br />';
			}

?>

<div id="bd">
	<form method="post" action="test2.php">
		
		<label>Ajout des images</label><br>
		<input type="file" id="image_uploads" name="image_uploads" accept=".jpg, .jpeg, .png" multiple><br>
		<div class="preview"></div>
		<input type="submit" name="cmdAjoutChapitre" value="Ajouter le chapitre">
	</form>
</div>

<script type="text/javascript">
		var input = document.querySelector('input');
		console.log(input);
		var preview = document.querySelector('.preview');
		input.addEventListener('change', updateImageDisplay);
		function updateImageDisplay() {
			//Supprimer les elements de la div
		  while(preview.firstChild) {
		    preview.removeChild(preview.firstChild);
		  }

		  	//Recuperer les infos des fichiers selectionnees
		  var curFiles = input.files;
		  	//Si aucun fichier selectionnées, on afficher un msg
		  if(curFiles.length === 0) {
		    var para = document.createElement('p');
		    para.textContent = 'Aucune images selectionnées';
		    preview.appendChild(para);
		  } else {
		    var list = document.createElement('ol');
		    preview.appendChild(list);
		    for(var i = 0; i < curFiles.length; i++) {
		      var listItem = document.createElement('li');
		      var para = document.createElement('p');
		      if(validFileType(curFiles[i])) {
		        para.textContent = 'File name ' + curFiles[i].name + '.';
		        var image = document.createElement('img');
		        image.src = window.URL.createObjectURL(curFiles[i]);

		        listItem.appendChild(image);
		        listItem.appendChild(para);

		      } else {
		        para.textContent = 'File name ' + curFiles[i].name + ': Not a valid file type. Update your selection.';
		        listItem.appendChild(para);
		      }

		      list.appendChild(listItem);
		    }
		  }
		}

		var fileTypes = [
		  'image/jpeg',
		  'image/pjpeg',
		  'image/png'
		]

		function validFileType(file) {
		  for(var i = 0; i < fileTypes.length; i++) {
		    if(file.type === fileTypes[i]) {
		      return true;
		    }
		  }

		  return false;
		}
	</script>
<?php
include("footer.php");
?>

