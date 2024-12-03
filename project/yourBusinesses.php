<?php
function parsePhoto($fileContent)
{
    // Get the file content

    // Encode the file content to base64
    $base64 = base64_encode($fileContent);

    // Create the img HTML tag
    $imgTag = '<img src="data:image/jpeg;base64,' . $base64 . '" alt="Photo" class="business-photo" style="width:5em ">';

    return $imgTag;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Businesses</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <?php include("views/header.php") ?>

    <br>
    <br>

    <div class="w3-responsive">


        <table class="w3-table-all w3-hoverable">

            <thead>
                <tr class="w3-light-grey">
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <?php
            include_once('models/businessModel.php');
            if (unserialize($_SESSION["user"])->name=="test"){
                $businesses = BusinessGetter::getAllBusinesses();

            } else {
                $businesses = BusinessGetter::getAllBusinessesForUser(unserialize($_SESSION['user'])->id);

            }
            
            foreach ($businesses as $business) {

                $name = $business->getName();
                $location = $business->getLocation();
                $photo = parsePhoto($business->getPhoto());
                $id = $business->getId();
                $description = $business->getDescription();


            ?>
                <tr onclick='openModal(<?php echo $id ?>)'>
                    <td id="name<?php echo $id ?>"><?php echo $name ?></td>
                    <td id="location<?php echo $id ?>"><?php echo $location ?></td>
                    <td id="description<?php echo $id ?>"><?php echo $description ?></td>
                    <td id="photo<?php echo $id ?>"><?php echo $photo ?></td>
                </tr>


            <?php


            }
            ?>
        </table>
    </div>


    <div id="businessModal" class="w3-modal">
        <div class="w3-modal-content">
            <header class="w3-container w3-teal">
                <span onclick="closeModal()" class="w3-button w3-display-topright">&times;</span>
                <h2 id="modalTitle"></h2>
            </header>
            <div class="w3-container">
                <form id="businessForm" onsubmit="updateBusiness(event)">
                    <!-- Form Fields -->
                    <input type="hidden" id="businessId" name="id">

                    <label for="modalName">Name:</label>
                    <input type="text" id="modalName" name="name"><br><br>

                    <label for="modalLocation">Location:</label>
                    <input type="text" id="modalLocation" name="location"><br><br>

                    <label for="modalDescription">Description:</label>
                    <textarea id="modalDescription" name="description"></textarea><br><br>

                    <label for="modalPhotoInput">Photo:</label>
                    <input type="file" id="modalPhotoInput" name="photo" onchange="readURL(this, 'modalPhoto');"><br><br>

                    <img id="modalPhoto" src="" alt="Your image" style="height: 5em;"><br><br>

                    <button type="submit">Update</button>
                    <button type="button" onclick="deleteBusiness()">Delete</button>

                </form>
            </div>
            <footer class="w3-container w3-teal">
                <p>Modal Footer</p>
            </footer>
        </div>
    </div>
    <script type="text/javascript">
        function readURL(input, imgId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(imgId).src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function openModal(id) {
            name = document.getElementById('name' + id).innerText;
            loc = document.getElementById('location' + id).innerText;
            description = document.getElementById('description' + id).innerText;
            photo = document.getElementById('photo' + id).getElementsByTagName("img")[0].src;


            // Set the modal fields
            document.getElementById('businessId').value = id;
            document.getElementById('modalTitle').innerText = name;
            document.getElementById('modalName').value = name;
            document.getElementById('modalLocation').value = loc;
            document.getElementById('modalDescription').value = description;
            document.getElementById('modalPhoto').src = photo;

            // Show the modal
            document.getElementById('businessModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('businessModal').style.display = 'none';

            // Reset the photo input
            document.getElementById('modalPhotoInput').value = '';

            // Reset the image preview
            document.getElementById('modalPhoto').src = '';
            
            location.reload();
        }

        function updateBusiness(event) {
            event.preventDefault();

            var id = event.target.elements['id'].value;
            var name = event.target.elements['name'].value;
            var location = event.target.elements['location'].value;
            var description = event.target.elements['description'].value;
            var photoInput = event.target.elements['modalPhotoInput'];
            var formData = new FormData(event.target);
            formData.append('id', id);
            formData.append('name', name);
            formData.append('location', location);
            formData.append('description', description);

            if (photoInput.files && photoInput.files[0]) {
                formData.append('photo', photoInput.files[0]);
            } else {
                photoInput = document.getElementById('modalPhoto').src
                formData.append('photo', photoInput)
            }
            console.log(formData.photo)

            $.ajax({
                url: 'updateBusiness.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    closeModal();
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        }

        function deleteBusiness() {
            var id = document.getElementById('businessId').value;

            $.ajax({
                url: 'deleteBusiness.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    closeModal();
                    reload();
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        }
    </script>
</body>

</html>