$(function () {
  $('#admiral').on('click', function () {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active')
      $('#header .header#nav a').css('display', 'block')
      $('#header .header#nav a').css('display', 'none')
    } else {
      $(this).addClass('active')
      $('#header .header#nav a').css('display', 'block')
    }
  })

  $('#destination-nav li').on('click', function () {
    $('#destination-nav li').removeClass('active')
    $(this).addClass('active')

    var destination = $(this).attr('id')
    console.log(destination)

    $.ajax({
      url: 'data.json',
      dataType: 'json',
      success: function (data) {
        var destinationData = data.destinations
        switch (destination) {
          case 'moon':
            $('h1').html(destinationData[0].name)
            $('p').html(destinationData[0].description)
            $('#distance').html(destinationData[0].distance)
            $('#time').html(destinationData[0].travel)
            $('.planet').attr('src', destinationData[0].images['png'])
            break

          case 'mars':
            $('h1').html(destinationData[1].name)
            $('p').html(destinationData[1].description)
            $('#distance').html(destinationData[1].distance)
            $('#time').html(destinationData[1].travel)
            $('.planet').attr('src', destinationData[1].images['png'])
            break

          case 'europa':
            $('h1').html(destinationData[2].name)
            $('p').html(destinationData[2].description)
            $('#distance').html(destinationData[2].distance)
            $('#time').html(destinationData[2].travel)
            $('.planet').attr('src', destinationData[2].images['png'])
            break

          case 'titan':
            $('h1').html(destinationData[3].name)
            $('p').html(destinationData[3].description)
            $('#distance').html(destinationData[3].distance)
            $('#time').html(destinationData[3].travel)
            $('.planet').attr('src', destinationData[3].images['png'])
            break
        }
      },
    })
  })

  if ($('.bullets') != null) {
    var iCrew = 0
    setInterval(() => {
      if (iCrew == 4) {
        iCrew = 0
        $('.bullets #crew' + iCrew).click()
      } else {
        iCrew++
        $('.bullets #crew' + iCrew).click()
      }
    }, 6000)
  }

  $('#crew-page .bullets li').on('click', function () {
    $('#crew-page .bullets li').removeClass('active')
    $(this).addClass('active')

    iCrew++
    var crewMember = $(this).attr('id')
    console.log(crewMember)

    $.ajax({
      url: 'data.json',
      dataType: 'json',
      success: function (data) {
        var crewData = data.crew
        switch (crewMember) {
          case 'crew0':
            $('h2, p, .rank, .portrait').fadeOut(300)
            setTimeout(function () {
              $('h2').html(crewData[0].name)
              $('p').html(crewData[0].bio)
              $('.rank').html(crewData[0].role)
              $('.portrait').attr('src', crewData[0].images['png'])
            }, 300)
            $('h2, p, .rank, .portrait').fadeIn(300)

            break

          case 'crew1':
            $('h2, p, .rank, .portrait').fadeOut(300)
            setTimeout(function () {
              $('h2').html(crewData[1].name)
              $('p').html(crewData[1].bio)
              $('.rank').html(crewData[1].role)
              $('.portrait').attr('src', crewData[1].images['png'])
            }, 300)
            $('h2, p, .rank, .portrait').fadeIn(300)
            break

          case 'crew2':
            $('h2, p, .rank, .portrait').fadeOut(300)
            setTimeout(function () {
              $('h2').html(crewData[2].name)
              $('p').html(crewData[2].bio)
              $('.rank').html(crewData[2].role)
              $('.portrait').attr('src', crewData[2].images['png'])
            }, 300)
            $('h2, p, .rank, .portrait').fadeIn(300)
            break

          case 'crew3':
            $('h2, p, .rank, .portrait').fadeOut(300)
            setTimeout(function () {
              $('h2').html(crewData[3].name)
              $('p').html(crewData[3].bio)
              $('.rank').html(crewData[3].role)
              $('.portrait').attr('src', crewData[3].images['png'])
            }, 300)
            $('h2, p, .rank, .portrait').fadeIn(300)
            break
        }
      },
    })
  })

  $('#technology-page .circle').on('click', function () {
    $('#technology-page .circle').removeClass('active')
    $(this).addClass('active')

    var techID = $(this).attr('id')
    console.log(techID)

    $.ajax({
      url: 'data.json',
      dataType: 'json',
      success: function (data) {
        var techData = data.technology
        switch (techID) {
          case 'tech0':
            $('h1, p, .image img').fadeOut(300)
            setTimeout(function () {
              $('h1').html(techData[0].name)
              $('p').html(techData[0].description)
              $('.image img').attr('src', techData[0].images['portrait'])
            }, 300)
            $('h1, p, img').fadeIn(300)
            break

          case 'tech1':
            $('h1, p, .image img').fadeOut(300)
            setTimeout(function () {
              $('h1').html(techData[1].name)
              $('p').html(techData[1].description)
              $('.image img').attr('src', techData[1].images['portrait'])
            }, 300)
            $('h1, p, img').fadeIn(300)
            break

          case 'tech2':
            $('h1, p, .image img').fadeOut(300)
            setTimeout(function () {
              $('h1').html(techData[2].name)
              $('p').html(techData[2].description)
              $('.image img').attr('src', techData[2].images['portrait'])
            }, 300)
            $('h1, p, img').fadeIn(300)
            break
        }
      },
    })
  })
})
