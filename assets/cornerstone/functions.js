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
            //cornerstoneTools.mouseInput.enable(element);
            //cornerstoneTools.mouseWheelInput.enable(element);
            //cornerstoneTools.wwwc.activate(element, 1); // ww/wc is the default tool for left mouse button
            //cornerstoneTools.pan.activate(element, 2); // pan is the default tool for middle mouse button
            //cornerstoneTools.zoom.activate(element, 4); // zoom is the default tool for right mouse button
            //cornerstoneTools.zoomWheel.activate(element); // zoom is the default tool for middle mouse wheel
            loaded = true;
        }
    }, function(err) {
        alert(err);
    });

  }

function activate(id)
    {
        $('a').removeClass('active');
        $(id).addClass('active');
    }

    function disableAllTools()
    {
        var element = $('#dicomImage').get(0);
        cornerstoneTools.simpleAngle.deactivate(element, 1);
        cornerstoneTools.length.deactivate(element, 1);
        cornerstoneTools.pan.deactivate(element, 2); // 2 is middle mouse button
        cornerstoneTools.zoom.deactivate(element, 4);
        cornerstoneTools.wwwc.deactivate(element, 1);
        //cornerstoneTools.arrowAnnotate.deactivate(element, 1);
    }

    //ANGLE _______________________________________________________________
  $('#activate').click(function() {
      var element = $('#dicomImage').get(0);
      activate("#activate");
      disableAllTools();

      var button = document.getElementById(activate);
      cornerstoneTools.simpleAngle.activate(element, 1);

      return false;
  });
  $('#deactivate').click(function() {
      var element = $('#dicomImage').get(0);
      activate("#deactivate");
      cornerstoneTools.simpleAngle.deactivate(element, 1);
      return false;
  });

  $('#clearAngleData').click(function() {
      var element = $('#dicomImage').get(0);
      if (confirm("Are you sure you want to delete the angle?") == true) {
        cornerstoneTools.clearToolState(element, "simpleAngle");
        cornerstone.updateImage(element);
      } else {}

  });

  //LENGHT _______________________________________________________________

    $('#enableLength').click(function() {
        var element = $('#dicomImage').get(0);
        activate('#enableLength')
        disableAllTools();
        cornerstoneTools.length.activate(element, 1);
    });

    $('#clearLengthData').click(function() {
        var element = $('#dicomImage').get(0);
        if (confirm("Are you sure you want to delete the length?") == true) {
          cornerstoneTools.clearToolState(element, "length");
          cornerstone.updateImage(element);
        } else {}
    });

//ZOOM AND PAN_________________________________________________________
    $('#pan').click(function() {
        var element = $('#dicomImage').get(0);
        activate('#pan')
        disableAllTools();
        cornerstoneTools.zoom.activate(element, 4); // 4 means right mouse button
        cornerstoneTools.pan.activate(element, 3); // 3 means left mouse button and middle mouse button
    });

    $('#zoom').click(function() {
        var element = $('#dicomImage').get(0);
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
        var element = $('#dicomImage').get(0);
        activate("#enable");
        cornerstoneTools.wwwc.enable(element);
        disableAllTools();
        return false;
    });

    $('#activateIM').click(function() {
        var element = $('#dicomImage').get(0);
        activate("#activateIM");
        cornerstoneTools.wwwc.activate(element, 1);
        return false;
    });

    $('#deactivate').click(function() {
        var element = $('#dicomImage').get(0);
        activate("#deactivate");
        cornerstoneTools.wwwc.deactivate(element, 1);
        return false;
    });

    $('#defaultStrategy').click(function() {
        var element = $('#dicomImage').get(0);
        activate("#defaultStrategy");
        disableAllTools();
        cornerstoneTools.wwwc.activate(element, 1);
        cornerstoneTools.wwwc.strategy = cornerstoneTools.wwwc.strategies.default;
        return false;
    });

    $('#osirixStrategy').click(function() {
        var element = $('#dicomImage').get(0);
        activate("#osirixStrategy");
        disableAllTools();
        cornerstoneTools.wwwc.activate(element, 1);
        cornerstoneTools.wwwc.strategy = cornerstoneTools.wwwc.strategies.osirix;
        return false;
    });

//SAVE_______________________________________________________________
    $('#save').click(function() {
        var element = $('#dicomImage').get(0);
        console.log("cenas");
        var filename = $("#filename").val();
        disableAllTools();
        cornerstoneTools.saveAs(element, filename);
        return false;
    });
