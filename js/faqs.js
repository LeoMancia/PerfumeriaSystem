// Cuando se hace click en una pregunta
$('.pregunta').on('click', function () {
    // Si la pregunta en la que se hizo click NO está abierta.
    if (!$('#' + $(this).data('resp_id')).hasClass('resp_act')) {
      // Cierro la que esté abierta, si es que hay alguna
      $('.ico_resp').removeClass('ico_resp_act');
      $('.resp_act').css('height', 0);
      $('.resp_act').removeClass('resp_act');
      // Abro la pregunta en la que se hizo click
      $('#' + $(this).data('resp_id')).css('height', $('#sp_' + $(this).data('resp_id')).height() + 'px');
      $('#' + $(this).data('resp_id')).addClass('resp_act');
      $('i', this).addClass('ico_resp_act');
    // Si no, si la pregunta ya está abierla
    } else {
      // La cierro
      $('.ico_resp').removeClass('ico_resp_act');
      $('.resp_act').css('height', 0);
      $('.resp_act').removeClass('resp_act');
    }
  });