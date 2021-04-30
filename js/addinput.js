var i;
if(document.getElementById('icount').length){
  i = document.getElementById('icount').value;;
}else{
  i = 0;
};
document.getElementById('addRow').addEventListener('click', function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="properties['+i+'][key]" class="form-control m-input ml-3" placeholder="Key" autocomplete="off">';
        html += '<input type="text" name="properties['+i+'][value]" class="form-control m-input ml-3" placeholder="Value" autocomplete="off">';
        html += '<div class="input-group-append ml-3">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Delete</button>';
        html += '</div>';
        html += '</div>';

        i++;

        // document.getElementById('newRow').append(html);
        document.getElementById('newRow').insertAdjacentHTML('beforeend', html);
    });

  // remove row
  document.getElementById('removeRow').addEventListener('click', function () {
      this.closest('#inputFormRow').remove();
  });
  //
