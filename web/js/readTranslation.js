/*
 * @author: Peter Long (http://peterlong.info);
 */

$(function(){
  $('#edition').change(changeLanguageList);
  $('#btn').click(changeTranslation);
});

function changeLanguageList(){
  var editionId = $('#edition option:selected').val();
  $('#language').load('/elanguages_' + editionId);
}

function changeTranslation(){
  var url='/turl_'
  + $('#edition option:selected').val()
  + '/'+ $('#language option:selected').val();

  $.get(url, function(data){
    $('#content').attr('src',data);
  });
}
