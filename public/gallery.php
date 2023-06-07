<link rel="stylesheet" href="css/baguetteBox.min.css">
<link rel="stylesheet" href="css/grid-gallery.css">

    <?php
        $db = mysqli_connect('localhost', 'root', '', 'joborder_db');
        if ($db->connect_error)
        { 
            die("Connection failed: " . $db->connect_error); 
        }

        $comp_id = $_POST['id'];
    ?>
    <section class="gallery-block grid-gallery py-4">
        <div class="container">
            <div class="row">

                <?php
                    $query = "SELECT * FROM gallery WHERE completed_id = $comp_id; ";

                    $results = mysqli_query($db, $query);

                    while($row = $results->fetch_assoc())
                    {
                        $img_name = $row['image_name'];
                        // echo $img_name;
                        echo '<div class="col-md-6 col-lg-6 item">
                                <a class="lightbox" href="img/gallery/'.$img_name.'">
                                    <img class="img-thumbnail image scale-on-hover" src="img/gallery/'.$img_name.'" alt="'.$img_name.'">
                                </a>
                            </div>';
                    }
                ?>

            </div>
        </div>
    </section>

<script src="js/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.grid-gallery', { animation: 'slideIn' });
</script>