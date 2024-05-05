var i;
if(document.querySelector('input[name="lastId"]').value.length){
  i = document.querySelector('input[name="lastId"]').value;
  i++;
} else {
  i = 0;
};
document.getElementById('addRow').addEventListener('click', function() {
  var html = '';
  html += '<tr>';
    html += '<td class="align-middle">' + i + '</td>';
    html += '<td class="align-middle">';
      html += '<input type="text" name="position_name[]" placeholder="Enter new position">';
    html += '</td>';
    html += '<td class="d-flex justify-content-center">';
      html += '<div class="input-group-append">';
        html += '<button type="button" class="addRow btn btn-success me-1">Add</button>';
        html += '<button type="button" class="removeRow justUI btn btn-danger ms-1">Delete</button>';
      html += '</div>';
    html += '</td>';
  html += '</tr>';

  document.getElementById('newRow').insertAdjacentHTML('beforebegin', html);
  this.disabled = true;
});

// remove row
document.querySelector('.table').addEventListener('click', function(e) {
  if (e.target.matches('button.removeRow')) {
    let tr = e.target.closest('tr');
    const addRow = document.getElementById('addRow');
    if (e.target.classList.contains('justUI')) {
      tr.remove();
      addRow.disabled = false;
    } else {
      data = {
        action_type: 'delete',
        id: tr.querySelector('input[name="currentId"]').value,
        token: document.querySelector('input[name="token"]').value
      }
      tr.remove();
      fetch('configs/pos_name.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
      }).then(() => {
        tr.remove();
        addRow.disabled = false;
      });
    }
  } else if (e.target.matches('.updateRow')) {
    let tr = e.target.closest('tr');
    data = {
      action_type: 'update',
      id: tr.querySelector('input[name="currentId"]').value,
      token: document.querySelector('input[name="token"]').value,
      position_name: tr.querySelector('input[name="position_name[]"]').value || 'No value'
    }
    fetch('configs/pos_name.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data)
    });
  } else if (e.target.matches('.addRow')) {
    let tr = e.target.closest('tr');
    e.target.disabled = true;
    data = {
      id: parseInt(document.querySelector('input[name="lastId"]').value) + 1,
      action_type: 'add',
      token: document.querySelector('input[name="token"]').value,
      position_name: tr.querySelector('input[name="position_name[]"]').value || 'No value'
    }
    fetch('configs/pos_name.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data)
    }).then(() => {
      location.reload();
    });
  }
});
