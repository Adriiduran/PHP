<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $background = $_GET['background'];
        $font = $_GET['font'];
        $image = $_GET['image'];
        $textalign = $_GET['textalign']
    ?>
    <style>
        body{
            background-color: <?php print $background; ?>;
            font-family: <?php print $font; ?>;
            text-align: <?php print $textalign;?>;
        }

        .imagen {
            max-height: 500px;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat ducimus odio quisquam possimus libero nisi! Doloribus, ipsa! Explicabo fugit hic minus debitis nisi odio tenetur, amet praesentium odit enim sapiente quidem perspiciatis neque libero distinctio quaerat quis laborum repellendus? Repudiandae ipsum aspernatur ratione hic amet similique. Officiis facilis voluptate iusto vero eaque ipsam eos repellat, quae culpa itaque? Inventore, obcaecati itaque impedit iure, voluptate nam odit recusandae expedita praesentium ex nemo mollitia laboriosam explicabo deserunt veniam similique voluptatum, autem voluptates. Accusamus itaque laborum recusandae obcaecati quas repudiandae sit velit ducimus corporis quia, iusto facere dolore, veniam totam maiores quis vero?</p>

    <img <?php echo 'src="',$image,'.jpg"'?> class="imagen">
</body>
</html>