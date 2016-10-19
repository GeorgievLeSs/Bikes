
 
<section id="liveChat">
    <div class="container">
        <div class="col-sm-8 col-offset-2">
            <?php 
                include 'pages/modules/newChatUserU.php';
            ?>
            <?php 
                include 'php/process.php';
            ?>
            <div id="us">

                <h2>jQuery/PHP Chat</h2>

                <p id="name-area"></p>

                <div id="chat-wrap"><div id="chat-area"></div></div>

                <form id="send-message-area">
                    <p>Your message: </p>
                    <textarea id="sendie" maxlength = '100'></textarea>
                </form>

            </div>
        </div>
    </div>
</section>
