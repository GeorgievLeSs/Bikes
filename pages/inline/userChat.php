

<div id="userChat">
    <div class="positionRelative"></div>

    <div id="topBar">
        <div id="openChat">

            <p>
                Live Chat
            </p>
        </div>
        <span>X</span>
    </div>

        <div id="inChatForm">
            <form role="form"  method="post" id="chatFormUser"  enctype="multipart/form-data">
                <fieldset>

                    <div class="form-group">
                        <label>
                            First Name
                        </label>
                        <input type="text" name="FirstName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            Last Name
                        </label>
                        <input type="text" name="LastName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        <input type="email" name="Email" class="form-control">
                    </div>
                    <button name="chat_form" id="btnChatFormUser"  data-role="none">Start Chat.</button>

                </fieldset>
            </form>

        </div>
        <div id="chatBox">

            <div id="chatArea"  class="color">
                <p></p>
            </div>

            <div id="typeMsg">
                <form id="sendMessageArea" role="form"  method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="chatID" class="form-control" value="">
                        <input type="hidden" name="rainbow" class="form-control" value="noRainbow">
                    <textarea class="sendWithEnter" maxlength = '100' name="userMsg" id="userId" row="30"></textarea>
                </form>
            </div>
        </div>
        <audio id="soundChat">

          <source src="jscss/js/jsChat/soundChat/Phone-Ringing.wav" type="audio/wav">

        Your browser does not support the audio element.
        </audio>
    </div>
