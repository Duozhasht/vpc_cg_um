cornerstoneWADOImageLoader.configure({
    beforeSend: function(xhr) {
        // Add custom headers here (e.g. auth tokens)
        //xhr.setRequestHeader('x-auth-token', 'my auth token');
    }
});

var loaded = false;

function loadAndViewImage(imageId) {
    var element = $('#dicomImage').get(0);
    cornerstone.loadImage(imageId).then(function(image) {
        console.log(image);
        console.log("asdasdasd");
        var viewport = cornerstone.getDefaultViewportForImage(element, image);
        $('#toggleModalityLUT').attr("checked",viewport.modalityLUT !== undefined);
        $('#toggleVOILUT').attr("checked",viewport.voiLUT !== undefined);
        cornerstone.displayImage(element, image, viewport);
        if(loaded === false) {
            cornerstoneTools.mouseInput.enable(element);
            cornerstoneTools.mouseWheelInput.enable(element);
            cornerstoneTools.wwwc.activate(element, 1); // ww/wc is the default tool for left mouse button
            cornerstoneTools.pan.activate(element, 2); // pan is the default tool for middle mouse button
            //cornerstoneTools.zoom.activate(element, 4); // zoom is the default tool for right mouse button
            //cornerstoneTools.zoomWheel.activate(element); // zoom is the default tool for middle mouse wheel
            loaded = true;
        }
    }, function(err) {
        alert(err);
    });

    function activate(id)
    {
        $('a').removeClass('active');
        $(id).addClass('active');
    }

    function disableAllTools()
    {
        cornerstoneTools.simpleAngle.deactivate(element, 1);
        cornerstoneTools.length.deactivate(element, 1);
        cornerstoneTools.pan.deactivate(element, 2); // 2 is middle mouse button
        cornerstoneTools.zoom.deactivate(element, 4);
        cornerstoneTools.wwwc.deactivate(element, 1);
        //cornerstoneTools.arrowAnnotate.deactivate(element, 1);
    }

    //ANGLE _______________________________________________________________
  $('#activate').click(function() {
      activate("#activate");
      disableAllTools();

      var button = document.getElementById(activate);
      cornerstoneTools.simpleAngle.activate(element, 1);

      return false;
  });
  $('#deactivate').click(function() {
      activate("#deactivate");
      cornerstoneTools.simpleAngle.deactivate(element, 1);
      return false;
  });

  $('#clearAngleData').click(function() {
      if (confirm("Are you sure you want to delete the angle?") == true) {
        cornerstoneTools.clearToolState(element, "simpleAngle");
        cornerstone.updateImage(element);
      } else {}

  });

  //LENGHT _______________________________________________________________

    $('#enableLength').click(function() {
        activate('#enableLength')
        disableAllTools();
        cornerstoneTools.length.activate(element, 1);
    });

    $('#clearLengthData').click(function() {
        if (confirm("Are you sure you want to delete the length?") == true) {
          cornerstoneTools.clearToolState(element, "length");
          cornerstone.updateImage(element);
        } else {}
    });

//ZOOM AND PAN_________________________________________________________
    $('#pan').click(function() {
        activate('#pan')
        disableAllTools();
        cornerstoneTools.pan.activate(element, 3); // 3 means left mouse button and middle mouse button
    });

    $('#zoom').click(function() {
        activate('#zoom')
        disableAllTools();
        cornerstoneTools.zoom.activate(element, 5); // 5 means left mouse button and right mouse button
    });

//TRESHOLD IMAGE_______________________________________________________________
    cornerstoneTools.wwwc.strategies.osirix  = function(eventData) {
        var imageDynamicRange = eventData.image.maxPixelValue - eventData.image.minPixelValue;
        var multiplier = imageDynamicRange / 1024;

        var deltaX = eventData.deltaPoints.page.x * multiplier;
        var deltaY = eventData.deltaPoints.page.y * multiplier;

        eventData.viewport.voi.windowWidth += (deltaX);
        eventData.viewport.voi.windowCenter -= (deltaY);
    };

    $('#enable').click(function() {
        activate("#enable");
        cornerstoneTools.wwwc.enable(element);
        disableAllTools();
        return false;
    });

    $('#activateIM').click(function() {
        activate("#activateIM");
        cornerstoneTools.wwwc.activate(element, 1);
        return false;
    });

    $('#deactivate').click(function() {
        activate("#deactivate");
        cornerstoneTools.wwwc.deactivate(element, 1);
        return false;
    });

    $('#defaultStrategy').click(function() {
        activate("#defaultStrategy");
        disableAllTools();
        cornerstoneTools.wwwc.activate(element, 1);
        cornerstoneTools.wwwc.strategy = cornerstoneTools.wwwc.strategies.default;
        return false;
    });

    $('#osirixStrategy').click(function() {
        activate("#osirixStrategy");
        disableAllTools();
        cornerstoneTools.wwwc.activate(element, 1);
        cornerstoneTools.wwwc.strategy = cornerstoneTools.wwwc.strategies.osirix;
        return false;
    });

//SAVE_______________________________________________________________
    $('#save').click(function() {
        var filename = $("#filename").val();
        disableAllTools();
        cornerstoneTools.saveAs(element, filename);
        return false;
    });

    $(cornerstone).bind('CornerstoneImageLoadProgress', function(eventData) {
        $('#loadProgress').text('Image Load Progress: ' + eventData.percentComplete + "%");
    });

  }

$(cornerstone).bind('CornerstoneImageLoadProgress', function(eventData) {
    $('#loadProgress').text('Image Load Progress: ' + eventData.percentComplete + "%");
});


$(document).ready(function() {

    var element = $('#dicomImage').get(0);
    cornerstone.enable(element);

    $('#selectFile').on('change', function(e) {
        // Add the file to the cornerstoneFileImageLoader and get unique
        // number for that file
        var file = e.target.files[0];
        var imageId = cornerstoneWADOImageLoader.fileManager.add(file);
        loadAndViewImage(imageId);
    });

    $('#toggleModalityLUT').on('click', function() {
        var applyModalityLUT = $('#toggleModalityLUT').is(":checked");
        console.log('applyModalityLUT=', applyModalityLUT);
        var image = cornerstone.getImage(element);
        var viewport = cornerstone.getViewport(element);
        if(applyModalityLUT) {
            viewport.modalityLUT = image.modalityLUT;
        } else {
            viewport.modalityLUT = undefined;
        }
        cornerstone.setViewport(element, viewport);
    });

    $('#toggleVOILUT').on('click', function() {
        var applyVOILUT = $('#toggleVOILUT').is(":checked");
        console.log('applyVOILUT=', applyVOILUT);
        var image = cornerstone.getImage(element);
        var viewport = cornerstone.getViewport(element);
        if(applyVOILUT) {
            viewport.voiLUT = image.voiLUT;
        } else {
            viewport.voiLUT = undefined;
        }
        cornerstone.setViewport(element, viewport);
    });

    $('a#hideOP').click(function(){
        $(this).toggleClass("options");
    });

    $("toggle-button").click(function(){
        $("target").toggle();
    });


});
