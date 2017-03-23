<html>
    <head>
        <title>Typing Test</title>
        <link rel="stylesheet" href="style.css">
        <script src="jquery-3.1.1.min.js"></script>
    </head>
    <body>
        <?php
            $text = file_get_contents('scripts/text_file.txt');
            $new_txt = '';
            $length = strlen($text);
        
            for($i=0;$i<$length;$i++){
                if(!isset($text[$i])) {
                    break;
                }
                if($i==0) {
                    $new_txt .= '<span class="letter active">'.$text[$i].'</span>';
                } else {
                    $new_txt .= '<span class="letter">'.$text[$i].'</span>';
                }
            }
        ?>
        <div class="container">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <b>Change Text File</b>
                <br />
                <input type="file" name="file">
                <br />
                <input type="submit" name="submit">
            </form>
            <div class="cont1" id="text_container">
                <input type="hidden" name="lengthOfChars" class="lengthOfChars" value="<?=$length?>">
                <?php
                    echo $new_txt;
                ?>
            </div>
        </div>
        <script>
            $('document').ready(function(){
                length = $('.lengthOfChars').val();
                count = 0;
                window.addEventListener("keydown", checkKeyPressed, false);
                
                function checkKeyPressed(e) {
                    if(count == length-1) {
                        alert('You are done!');
                        document.reload();
                    }
                    
                    var char = $('.active');
                    var charVal = $('.active').html();
                    
                    if(e.key != undefined) {
                        
                        if (e.key.charCodeAt() == charVal.charCodeAt()) {
                            // pressed right button
                            // remove active from current
                            char.removeClass('active');
                            // and set active class to it's next
                            char.next().attr('class',' active');
                            // also remove wrong class if exists
                            char.removeClass('wrong');
                            // set recent class (typed character)
                            char.addClass('recent');

                            // update counter
                            count = count + 1;
                        } else {
                            char.addClass('wrong');
                        }
                        
                    }
                }
            });
            
        </script>
    </body>
</html>