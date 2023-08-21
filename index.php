<?php
include_once "db-config.php";
$con = connection();

include "create.php";
include "update.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            /* background-color:#f7f7f7; */
            margin:0;
            padding:0;
        }
        
        textarea{
            resize: none;
            padding: 10px;
            font-size: 18px;
            width:100%;
        }            

    </style>
</head>


<body>

    <div>
        <button class="pop-btn" data-bs-toggle="modal" data-bs-target="#post-modal">
            Click here to post something...
        </button>
    </div>

    <!-- CREATE -->
    <div class="modal fade" id="post-modal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Create Post</h5>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" oninput="createSpacesAndNewLines();">
                        <textarea rows="7" name="createPostMsg" placeholder="Write something..."></textarea>
                    <!-- ↓↓↓↓↓↓↓↓↓↓ -->
                </div>

                <div class="modal-footer">
                    <!-- ↑↑↑↑↑↑↑↑↑↑↑ -->
                        <a href="index.php" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel">Cancel</a>
                        <button class="btn btn-primary" id="post" name="post">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
       $sql = $con->query("SELECT * FROM `announcements`");
        $data = $sql->fetch_assoc();
        $nums = $sql->num_rows;
    ?>

    <?php if($nums > 0) { ?>
        <br><hr>

        <?php do{ ?>
            <div class="postbox">
                <div class="top-right-area">
                    <?php $ud = $data['annc_code']; ?>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:none; background:#e9e9e9; font-size:14px; color:#3d3d3d">
                            <i class="fa-solid fa-gear"></i>
                        </button>

                        <ul class="dropdown-menu">
                        <li><button id="editbtn" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update-modal<?=$ud?>">Edit</button></li>
                        <li><button id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#del-modal<?=$ud?>">Delete</button></li>
                        </ul>
                    </div>
                </div>

                <!-- UPDATE -->
                <div class="modal fade" id="update-modal<?=$ud?>" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-large">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Update Post</h5>
                            </div>

                            <div class="modal-body">
                                <?php $char = $data['message'];?>
                                <form action="" method="POST" class="msg-form">
                                    <input type="text" name="postCode" value="<?=$data['annc_code']?>" hidden>
                                    <textarea rows="7" class="postMsg" name="updatePostMsg">
                                        <?=$char;?>
                                    </textarea>
                                <!-- ↓↓↓↓↓↓↓↓↓↓ -->
                            </div>

                            <div class="modal-footer">
                                <!-- ↑↑↑↑↑↑↑↑↑↑↑ -->
                                    <a href="index.php" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel">Cancel</a>
                                    <button class="btn btn-primary" id="post" name="update">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                    <!-- DELETE -->
                <div class="modal fade" id="del-modal<?=$ud?>" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-large">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>

                            <div class="modal-body" style="text-align:center">
                                <h5>Are you sure you want to delete this post?</h5>
                            </div>

                            <div class="modal-footer">
                                <form action="delete.php" method="post">
                                    <input type="text" name="anccode" value="<?=$data['annc_code'];?>" hidden>
                                    <button id="delbtn" name="terminate" class="btn btn-danger">
                                        Yes
                                    </button>
                                    <a href="index.php" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel">No</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <input type="checkbox" id="check<?=$ud?>" class="check">
                <div style="font-size:14px; color:gray; text-align:end;">
                    <?="<b>Posted: </b>" . $data['posted_time'];?>
                </div> <br>
                <div id="msg"> <?=nl2br($data['message']);?> </div>
                <label for="check<?=$ud?>" class="readmorelabel">Read More</label>


            </div>
            <br>
        <?php } while($data = $sql->fetch_assoc()); ?>

    <?php } else{ ?>
        <span> 
            <i> No posted announcements found... </i>
        </span>
    <?php } ?>


    <style>

        .postbox{
            padding:10px 20px 10px 20px;
            border-radius: 10px;
            border: 1px solid #aaa;
            background: #f5f5f5;
        }

        .top-right-area{
            display: flex;
            justify-content: end;
        }

        .postbox > .top-right-area > .editbtn{  /* edit */
            margin:1px;
        }

        .postbox > .top-right-area > form{ /* delete */
            padding:0;
            margin:1px;
        }



        #msg{
            word-wrap:break-word;
            text-align:justify;
            max-height: 170px;
            margin-bottom:5px;

            display: -webkit-box;
            -webkit-line-clamp:5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            /* border: 1px solid; */
        }

        .check{
            display: none;
        }

        .readmorelabel{
            color:#00525e;
            text-decoration: underline;
        }


        .check:checked ~ #msg{
            display: block;
            max-height: none;
            overflow: auto;
        }


        .check:checked ~ .readmorelabel{
            visibility: hidden;
        }

        .check:checked ~ .readmorelabel:after{
            content: 'Show Less';
            display:block;
            visibility: visible;
        }


        @media only screen and (min-width: 800px){
            #msg{
                display: block;
                max-height:none;
                overflow:auto;
                /* border: 1px solid; */
            }

            .readmorelabel{
                padding:0;
                margin:0;
                display: none;
            }
        }
    </style>





    <script>
        const editbtn = document.querySelectorAll("#editbtn");
        const messages = document.querySelectorAll(".postMsg");

        editbtn.forEach( button =>
            button.addEventListener('click', trimmerFunc)
        );

        function trimmerFunc(){
            messages.forEach(message => message.value = message.value.trim());
        }

        // i made this function because whenever the edit button is clicked to edit some post message
        // the format appearing in textarea is totally messed (has some weird white spaces).

    </script>

</body>
</html>
