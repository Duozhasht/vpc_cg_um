<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CR Tool</title>
		<link href="assets/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!-- Fonts -->
		<link rel="stylesheet" href="assets/font-awesome-4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
		
		<link href="assets/dropzone/dropzone.css" rel="stylesheet">
		<link href="assets/dropzone/basic.css" rel="stylesheet">
		<link href="assets/custom.css" rel="stylesheet">
		<link href="assets/dialogPolyfill.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid" style="height: 100%;">
			<div class="row" id="content" style="height: 100%;">
				<div class="col-lg-3 fill" id="sidebar">
					<div class="row" id="header">
						<div class="col-xs-12">
							<img src="assets/images/logo.png" class="img-responsive" alt="Logo" width="102" height="124">
						</div>
						<div class="col-xs-12">
							<h3 class="text-center" id="main-title">CR TOOL</h3>
							<hr>
						</div>
					</div>
					
					<div class="row" id="patient-info">
						<div class="col-xs-12">
							<h4 class="text-center" id="patient-info-header">Patient Info</h4>
							<ul class="nav nav-pills nav-stacked" id="patient-info-ul">
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Patient Name :</span>
										<span id="patient-name"></span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Patient Birth Date :</span>
										<span id="patient-bd"></span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Patient Sex :</span>
										<span id="patient-sex"></span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Study Date :</span>
										<span id="study-date"></span>
									</a>
								</li>
								<li role="presentation" class="active">
									<a>
										<span style="color:#7b96b0">Study Description :</span>
										<span id="study-description"></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row text-center" id="files-here">
						<h3 class="text-center">Drag Your Files to the Page </h3>
						<h5 class="text-center" style="color:#7b96b0">or click the button to choose a file</h5>
					</div>
					<div class="row text-center hidden" id="files-title">
						<h4 class="text-center">Files Added</h4>
					</div>
					<div class="row text-center">
						<button type="button" class="nice-button" id="clickable">Open File</button>
					</div>
					<div class="row" id="dropzone">
						<div id="previews" class="dropzone-previews" style="overflow-y: auto; max-height: 300px;">
						<div id="preview-template" style="visibility: hidden;">							
								<div class="col-xs-12">
								<a href="#" class="dz-preview dz-file-preview">
									<span class="dz-details">
										<span class="dz-filename">
											<span style="color: #7b96b0;">File name: </span>
											<span data-dz-name></span>
										</span>
									</span>
								</a>
								</div>							
						</div>
					<!-- <form action="/target" class="dropzone" id="my-dropzone" style="overflow-y: scroll; max-height: 300px;"></form>  -->
						
							
						</div>
				</div>

				<div class="row text-center" id="authors" style="min-height: 100%;">
					<hr>
					<p>Crafted by <a href="#">Tiago</a>, <a href="#">Rafael</a>, <a href="#">Carlos</a>
					@
					<!--<a href="#"><span style="color: #D03B00">Minho's</span> <span style="color: #D03B00">University</span></a></p>-->
					<a href="#">Minho's University</a></p>
				</div>
			</div>
			<div class="col-lg-9" id="tool-content">
				<div class="row">
					<div class="col-lg-offset-6 col-lg-6 centering" >
						<div class="options" id="toolbar">
							<ul class="nav nav-pills text-center spaces">
								<li role="presentation">
									<a id="pan" class="list-group-item">
										<i class="fa fa-arrows fa-lg"></i>
									</a>
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
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-10 centering" id="canvas">
						<div style="width:1000px;height:650px;position:relative;color: #7b96b0;display:inline-block;border: 2px solid #7b96b0; background-color: #141414"
							oncontextmenu="return false"
							class='disable-selection noIbar'
							unselectable='on'
							onselectstart='return false;'
							onmousedown='return false;'>
							<div id="dicomImage"
								style="width:995px;height:645px;top:0px;left:0px; position:absolute">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-offset-5 col-lg-7 centering" style="padding-left: 50px;">
						<div class="options" id="toolbar">
							<ul class="nav nav-pills text-center spaces">
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
								<li role="presentation">
									<a id="save" class="list-group-item"><i class="fa fa-floppy-o fa-lg"></i></a>
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
	
	$('.Scrollable').on('DOMMouseScroll mousewheel', function(ev) {
	var $this = $(this),
	scrollTop = this.scrollTop,
	scrollHeight = this.scrollHeight,
	height = $this.height(),
	delta = (ev.type == 'DOMMouseScroll' ?
	ev.originalEvent.detail * -40 :
	ev.originalEvent.wheelDelta),
	up = delta > 0;
	var prevent = function() {
	ev.stopPropagation();
	ev.preventDefault();
	ev.returnValue = false;
	return false;
	}
	if (!up && -delta > scrollHeight - height - scrollTop) {
	// Scrolling down, but this will take us past the bottom.
	$this.scrollTop(scrollHeight);
	return prevent();
	} else if (up && delta > scrollTop) {
	// Scrolling up, but this will take us past the top.
	$this.scrollTop(0);
	return prevent();
	}
	});
	var PatientName = "x00100010";
	var PatientBirthDate = "x00100030";
	var PatientSex = "x00100040";
	var StudyDate = "x00080020";
	var StudyDescription = "x00081030";
	var imageCount = 0;
	var imageFiles = [];
	var imageIds = [];
		function previewOnClick(id) {
			var element = $('#dicomImage').get(0);
			cornerstone.enable(element);
			parseDicom(imageFiles[id]);
			loadAndViewImage(imageIds[id]);
	}
	String.prototype.insert = function(index, string) {
	if (index > 0)
	return this.substring(0, index) + string + this.substring(index, this.length);
	else
	return string + this;
	};
	function parseDicom(file) {
	var reader = new FileReader();
	reader.onload = function(file) {
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
	function updatePatientInfo(name, birthDate, sex, studyDate, studyDesc) {
	$('#patient-name').text(name);
	$('#patient-bd').text(birthDate);
	$('#patient-sex').text(sex);
	$('#study-date').text(studyDate);
	$('#study-description').text(studyDesc);
	}
	


	var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    	url: "/upload/url", // Set the url
    	previewsContainer: "#previews", // Define the container to display the previews
    	clickable: "#clickable",
    		previewTemplate: document.getElementById('preview-template').innerHTML,
	// Prevents Dropzone from uploading dropped files immediately
	autoProcessQueue: false,
	init: function() {
	var myDropzone = this;
	var flag = false;
	//this function handle addedfile
	this.on("addedfile", function(file) {
	imageFiles.push(file);
	$(file.previewElement).attr("onclick", "previewOnClick(" + imageCount + ")");
	$(file.previewElement).attr("id", "elem" + imageCount + ")");
	var imageId = cornerstoneWADOImageLoader.fileManager.add(file);
	if(flag == false)
	{	
		$('#files-title').removeClass('hidden');
		$('#files-here').addClass('hidden');
		flag = true;
	}
	imageIds.push(imageId);
	imageCount++;
	});
	}
    	
  });

	</script>
</html>