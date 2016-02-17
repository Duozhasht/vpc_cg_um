<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CR Tool</title>
		<link href="assets/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">

		<!-- Fonts -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
		
		<link href="assets/custom.css" rel="stylesheet">


		<link href="assets/dialogPolyfill.css" rel="stylesheet">
		

		<link href="assets/dropzone/dropzone.css" rel="stylesheet">
		<link href="assets/dropzone/basic.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row" id="content">
				
				<div class="col-lg-offset-1 col-lg-3">
					<div class="row" id="header">
						<div class="col-xs-12">
							<img src="assets/images/logo.png" class="img-responsive" alt="Logo" width="120" height="145">
						</div>
						<div class="col-xs-12">
							
							<h2 class="text-center" id="main-title">CR Tool</h2>
							<hr>
						</div>
					</div>
					
					<div class="row" id="patient-info">
						<div class="col-xs-10">
							<h3 class="text-center">Patient Info</h3>
							<ul class="nav nav-pills nav-stacked" id="patient-info-ul">
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Patient Name :</span>
										<span id="patient-name">asdasd</span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Patient Birth Date :</span>
										<span id="patient-bd">asdasd</span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Patient Sex :</span>
										<span id="patient-sex">asdasd</span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Study Date :</span>
										<span id="study-date">asdasd</span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Study Description :</span>
										<span id="study-description">asdasd</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row" id="dropzone">
						<div id="preview-template" style="display: none;">
							<div class="dz-preview dz-file-preview">
								<div class="dz-details">
									<div class="dz-filename">
										<span data-dz-name></span>
									</div>
									
								</div>
							</div>
						</div>
					<form action="/target" class="dropzone" id="my-dropzone"></form>
				</div>
			</div>
			<div class="col-lg-8" id="tool-content">
				<div class="row">
					<div class="col-lg-offset-6 col-lg-6 centering">
						<div class="options" id="toolbar">
							<ul class="nav nav-pills text-center">
								<li role="presentation">
									<a id="pan" class="list-group-item"><i class="fa fa-arrows fa-lg"></i></a>
								</li>
								<li role="presentation">
									<a id="zoom" class="list-group-item"><i class="fa fa-search-plus fa-lg"></i></a>
								</li>
								<li role="presentation">
									<a id="defaultStrategy" class="list-group-item"><i class="fa fa-picture-o fa-lg"></i></a>
								</li>
								<li role="presentation">
									<a id="osirixStrategy" class="list-group-item"><i class="fa fa-picture-o fa-lg"></i></a>
								</li>
								<li role="presentation">
									<a id="save" class="list-group-item"><i class="fa fa-floppy-o fa-lg"></i></a>
								</li>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-offset-2 col-lg-10 centering" id="canvas">
						<div style="width:900px;height:650px;position:relative;color: white;display:inline-block;border-style:solid;border-color:black;"
							oncontextmenu="return false"
							class='disable-selection noIbar'
							unselectable='on'
							onselectstart='return false;'
							onmousedown='return false;'>
							<div id="dicomImage"
								style="width:900px;height:650px;top:0px;left:0px; position:absolute">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-offset-6 col-lg-6 centering" style="padding-left: 50px">
						<div class="options" id="toolbar">
							<ul class="nav nav-pills text-center">
								<li role="presentation">
									<a id="activate" class="list-group-item"><i class="fa fa-angle-right fa-lg"></i></a>
								</li>
								<li role="presentation">
									<a id="enableLength" class="list-group-item"><i class="fa fa-arrows-h fa-lg"></i></a>
								</li>							
								<li role="presentation">
									<a id="clearAngleData" class="list-group-item"><i class="fa fa-eraser fa-lg"></i>   <i class="fa fa-angle-right fa-lg"></i></a>
								</li>
								<li role="presentation">
									<a id="clearLengthData" class="list-group-item"><i class="fa fa-eraser fa-lg"></i>   <i class="fa fa-arrows-h fa-lg"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</body>
	<!-- jquery - currently a dependency and thus required for using cornerstoneWADOImageLoader -->
	<script src="assets/jquery-2.2.0.min.js"></script>
	<!-- Bootstrap -->
	<script src="assets/bootstrap-3.3.6/js/bootstrap.min.js"></script>
	<!-- include the cornerstone library -->
	<script src="assets/cornerstone/cornerstone.min.js"></script>
	<SCRIPT src="assets/cornerstone/cornerstoneMath.js"></SCRIPT>
	<SCRIPT src="assets/cornerstone/cornerstoneTools.js"></SCRIPT>
	<!-- include the dicomParser library as the WADO image loader depends on it -->
	<script src="assets/cornerstone/dicomParser.min.js"></script>
	<!-- jpeg 2000 codec -->
	<script src="assets/cornerstone/jpx.min.js"></script>
	<!-- include the cornerstoneWADOImageLoader library -->
	<script src="assets/cornerstone/cornerstoneWADOImageLoader.js"></script>
	<!-- include the Dialog library -->
	<!--script src="assets/cornerstone/dialogPolyfill.js"></script-->
	<!-- include All's function -->
	<script src="assets/cornerstone/functions.js"></script>
	<!-- Dropzone.js-->
	<script src="assets/dropzone/dropzone.js"></script>
	<script>
	
	var PatientName = "x00100010";
	var PatientBirthDate = "x00100030";
	var PatientSex = "x00100040";
	var StudyDate = "x00080020";
	var StudyDescription = "x00081030";
	
	var imageCount = 0;
	var imageFiles = [];
	var imageIds = [];
	
	function previewOnClick(id)
	{
		parseDicom(imageFiles[id]);
		loadAndViewImage(imageIds[id]);
	}
	
	String.prototype.insert = function (index, string)
	{
		if (index > 0)
			return this.substring(0, index) + string + this.substring(index, this.length);
		else
			return string + this;
	};
	
	function parseDicom(file)
	{
		var reader = new FileReader();
		reader.onload = function(file)
			{
				var arrayBuffer = reader.result;
				var byteArray = new Uint8Array(arrayBuffer);
				
				var dataSet = dicomParser.parseDicom(byteArray);
				
				var name = dataSet.string(PatientName).replace(/[^\w\s]/gi, ' ');
				var birthDate = dataSet.string(PatientBirthDate);
				var sex = dataSet.string(PatientSex);
				var studyDate = dataSet.string(StudyDate);
				var studyDesc = dataSet.string(StudyDescription);
				
				birthDate = birthDate.insert(4, "-").insert(7, "-");
				studyDate = studyDate.insert(4, "-").insert(7, "-");
				
				updatePatientInfo(name, birthDate, sex, studyDate, studyDesc);
			}
		reader.readAsArrayBuffer(file);
	}
	function updatePatientInfo(name, birthDate, sex, studyDate, studyDesc){
		$('#patient-name').text(name);
		$('#patient-bd').text(birthDate);
		$('#patient-sex').text(sex);
		$('#study-date').text(studyDate);
		$('#study-description').text(studyDesc);
	}

	$(document).ready(function() {
		

		var element = $('#dicomImage').get(0);
		cornerstone.enable(element);
		Dropzone.options.myDropzone = {
			
		previewTemplate: document.getElementById('preview-template').innerHTML,
		
		// Prevents Dropzone from uploading dropped files immediately
		autoProcessQueue: false,
		
		init: function() {
					
		var myDropzone = this;
		
			//this function handle addedfile
		this.on("addedfile", function(file) {
				imageFiles.push(file);
					$( file.previewElement ).attr("onclick", "previewOnClick("+imageCount+")");
					
							var imageId = cornerstoneWADOImageLoader.fileManager.add(file);
					
						imageIds.push(imageId);
					imageCount++;
		});
		
		
		}
		};
	});
	</script>
</html>