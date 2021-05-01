// var i;
// if(document.getElementById('icount').length){
//   i = document.getElementById('icount').value;;
// }else{
//   i = 0;
// };
document.getElementById('addRow').addEventListener('click', function () {
        var html = '';
        html += '<div id="inputFormRow">';
          html += '<tr>';
            html += '<td></td>';
            html += '<td>';
              html += '<input type="text" name="position_name[]" placeholder="Enter new position">';
            html += '</td>';
            html += '<td>';
              html += '<div class="input-group-append ml-3">';
                html += '<button id="removeRow" type="button" class="btn btn-danger">Delete</button>';
              html += '</div>';
            html += '</td>';
          html += '</tr>';
        html += '</div>';
        //
        // i++;

        // document.getElementById('newRow').append(html);
        document.getElementById('newRow').insertAdjacentHTML('beforeend', html);
    });

  // remove row
  document.getElementById('removeRow').addEventListener('click', function () {
      this.closest('#inputFormRow').remove();
  });
  //
