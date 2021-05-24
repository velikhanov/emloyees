var i;
if(document.querySelector('input[name=lastid]').value.length){
  i = document.querySelector('input[name=lastid]').value;
  i++;
}else{
  i = 0;
};
document.getElementById('addRow').addEventListener('click', function () {
        var html = '';
        html += '<tr>';
          html += '<td>'+i+'</td>';
          html += '<td>';
            html += '<input type="text" name="position_name[]" placeholder="Enter new position">';
          html += '</td>';
          html += '<td>';
            html += '<div class="input-group-append ml-3">';
              html += '<button  type="button" class="removeRow btn btn-danger">Delete</button>';
            html += '</div>';
          html += '</td>';
        html += '</tr>';
        //
        i++;

        // document.getElementById('newRow').append(html);
        document.getElementById('newRow').insertAdjacentHTML('beforebegin', html);
    });

  // remove row
  document.querySelector('.table').addEventListener('click', function (e){
   if(e.target.matches('button.removeRow')){
      e.target.closest('tr').remove()
   };

});
