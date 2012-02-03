 function setEditable(model, field, id){
   $('#'+model+'_'+field).editable('/user/edit',{
      indicator : 'Saving...',
      tooltip   : 'Click to edit...',
      submit : 'OK',
      cancel : 'Cancel',
      submitdata: { 'model' : model, 'id' : id, 'field' : field }
    });
 }
