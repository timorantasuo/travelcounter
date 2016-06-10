function toggle_visibility(id) {
             var e = document.getElementById(id);
             if(e.style.display === 'block'){
                e.style.display = 'none';
                $('#togg').text('show footer');
            }
             else {
                e.style.display = 'block';
                $('#togg').text('hide footer');
            }
          }