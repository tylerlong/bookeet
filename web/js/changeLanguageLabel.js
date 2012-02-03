/* 
 * @author: Peter Long  http://peterlong.info
 */

function changLanguageLabel(prefix){
  $(function(){
    changeLabel(prefix);
    $('#'+prefix+'language_id').change(function(){
      changeLabel(prefix);
    });
  });
}

function changeLabel(prefix){
  var language = $("#"+prefix+"language_id option:selected").text();
  var titleLabel=$("label[for="+prefix+"title]");
  titleLabel.text(titleLabel.text().replace(/(?: in [^\s]+)?$/, ' in '+language));
  var descriptionLabel=$("label[for="+prefix+"description]");
  descriptionLabel.text(descriptionLabel.text().replace(/(?: in [^\s]+)?$/, ' in '+language));
}
