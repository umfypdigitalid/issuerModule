var ajax = new XMLHttpRequest();
var method = "GET";
//var url = "test.php"
var url = "pending.php";
var asynchronous = true;

ajax.open(method, url, asynchronous);
ajax.send();
ajax.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    // alert(this.responseText);

    var data = JSON.parse(this.responseText);
    console.log(data);

    buildTable(data);

    function buildTable(data) {
      var table = document.getElementById("data");
      for (var i = 0; i < data.length; i++) {
        /*  var row = `<tr>
							<td>${data[i].createdon}</td>
							<td>${data[i].fullname}</td>
							<td>${data[i].nric}</td>
              <td>${data[i].birthdate}</td>
              <td>${data[i].address}</td>
              <td>${data[i].email}</td>
              <td>${data[i].applicationstatus}</td>
					  </tr>`;*/
        var row =
          "<tr>" +
          "<td>" +
          data[i].createdon +
          "</td>" +
          "<td>" +
          data[i].fullname +
          "</td>" +
          "<td>" +
          data[i].nric +
          "</td>" +
          "<td>" +
          data[i].address +
          "</td>" +
          "<td>" +
          data[i].email +
          "</td>" +
          "<td>" +
          "<img src=" +
          data[i].image +
          " width = '200' height = '100'" +
          "</td>" +
          "<td>" +
          data[i].applicationstatus +
          "</td>" +
          '<td><button type="btn_verify" id="btn_verify" name="verify" class="btn btn-success btn-xs remove_details">Verify</button><br><button type="btn_reject" id="btn_reject" name="reject" class="btn btn-danger btn-xs remove_details">Reject</button></td>';
        +"</tr>";
        table.innerHTML += row;
      }
    }

    /*$(document).ready(function () {
    $("table tbody tr").click(function () {
      var imagePlaceholder = $("#image-placeholder");
      imagePlaceholder.html("");
      $("<img>", {
        src: image,
      }).appendTo(imagePlaceholder);     
     $("#image-placeholder").toggle();
    });
  });*/
    $(document).ready(function () {
      //$('#example1').DataTable();
      $("#btn_verify").on("click", function (e) {
        alert("clicked verify");
        e.preventDefault();
        e.stopPropagation();

        var $ic = $(this.closest("tr")).find("td:eq(2)").text();
        $.ajax({
          type: "POST",
          url: "update.php",
          dataType: "text",
          data: { ic: JSON.stringify($ic), status: "Verified" },
          success: function (data, status, xhr) {
            alert("response was " + data);
            location.reload();
          },
          error: function (xhr, status, error) {
            console.error(xhr);
          },
        });
      });

      $("#btn_reject").on("click", function (e) {
        alert("click rejected");
        e.preventDefault();
        e.stopPropagation();

        var $reject = $(this.closest("tr")).find("td:eq(2)").text();

        $.ajax({
          type: "POST",
          url: "update.php",
          dataType: "text",
          data: { ic: JSON.stringify($reject), status: "Rejected"},
          success: function (data, status, xhr) {
            alert("response was " + data);
            location.reload();
          },
          error: function (xhr, status, error) {
            console.error(xhr);
          },
        });
      });
      $('#example1 tbody').on('click','tr td:eq(6)',function(){
        
        const lightbox = document.createElement('div')
        lightbox.id = 'lightbox'
        document.body.appendChild(lightbox)
    
        const images = document.querySelectorAll('img')
        images.forEach(image => {
            image.addEventListener('click', e => {
                lightbox.classList.add('active')
                const img = document.createElement('img')
                img.src = image.src
                while (lightbox.firstChild) {
                    lightbox.removeChild(lightbox.firstChild)
                }
                lightbox.appendChild(img)
            })
        })
    
        lightbox.addEventListener('click', e => {
            if (e.target !== e.currentTarget) return
            lightbox.classList.remove('active')
        })
      })

    });
  }
};
