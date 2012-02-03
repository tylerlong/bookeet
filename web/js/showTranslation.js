/*
 * @author: Peter Long (http://peterlong.info);
 */

$(function(){
  $('#edition').change(changeLanguageList);
  $('#language').change(changeTranslation);
});

function changeLanguageList(){
  var editionId = $('#edition option:selected').val();
  $('#language').load('/elanguages_' + editionId);
  changeTranslation();
}

function changeTranslation(){
   var url='/tid_'
  + $('#edition option:selected').val()
  + '/'+ $('#language option:selected').val();

  $.get(url, function(data){
    window.location='/t_'+data;
  });
}
