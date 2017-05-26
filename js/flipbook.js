$("#flipbook").turn({
		width: 800,
		height: 600,
		autoCenter: true
	});

    $(document).keydown(function(e) {
switch (e.keyCode) {
    case 37:

    $('#flipbook').turn('previous');

    break;
    case 39:

      $('#flipbook').turn('next');

    break;
  }
    });
