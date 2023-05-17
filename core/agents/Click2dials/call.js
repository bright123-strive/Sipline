function InitUi(){

    ApplyThemeColor()
















    var phone = $("#Details");
    phone.empty();
    phone.attr("class", "pageContainer");
    phone.css("max-width", UiMaxWidth + "px");

    // Left Section
    var leftSection = $("<div/>");
    leftSection.attr("id", "leftContent");
    leftSection.attr("style", "float:left; height: 100%; width:320px");

    var leftHTML = "<table id=leftContentTable class=leftContentTable style=\"height:100%; width:100%\" cellspacing=0 cellpadding=0>";
    leftHTML += "<tr><td class=streamSection style=\"height: 90px; box-sizing: border-box;\">";
    
    // Profile User
    leftHTML += "<div class=profileContainer>";
    leftHTML += "<div class=contact id=UserProfile style=\"cursor: default; margin-bottom:5px;\">";
    leftHTML += "<div id=UserProfilePic class=buddyIcon></div>";
    leftHTML += "<span class=settingsMenu><button class=roundButtons id=SettingsMenu><i class=\"fa fa-cogs\"></i></button></span>";
    leftHTML += "<div class=contactNameText style=\"margin-right: 0px;\">"

    // Status
    leftHTML += "<span id=dereglink class=dotOnline style=\"display:none\"></span>";
    leftHTML += "<span id=WebRtcFailed class=dotFailed style=\"display:none\"></span>";
    leftHTML += "<span id=reglink class=dotOffline></span>";

    // User
    leftHTML += " <span id=UserDID></span> - <span id=UserCallID></span>"
    leftHTML += "</div>";
    leftHTML += "<div id=regStatus class=presenceText>&nbsp;</div>";
    leftHTML += "</div>";

    // Action Buttons
    leftHTML += "<div style=\"padding-left:5px; padding-right:5px; height: 35px; line-height: 35px;\">";
    leftHTML += "<button class=roundButtons id=BtnFindBuddy><i class=\"fa fa-search\"></i></button>";
    leftHTML += "<span id=divFindBuddy class=searchClean style=\"display:none\"><INPUT id=txtFindBuddy type=text autocomplete=none style=\"width:120px;\"></span>";
    leftHTML += "<button class=roundButtons id=BtnFreeDial><i class=\"fa fa-phone\"></i></button>";
    leftHTML += "<button class=roundButtons id=BtnAddSomeone><i class=\"fa fa-user-plus\"></i></button>";
    leftHTML += "<button class=roundButtons id=BtnVoicemail style=\"position:relative\"><i class=\"fa fa-envelope-square\"></i><span id=TxtVoiceMessages class=voiceMessageNotifyer>0</span></button>";
    if(false){
         // TODO
        leftHTML += "<button id=BtnCreateGroup><i class=\"fa fa-users\"></i><i class=\"fa fa-plus\" style=\"font-size:9px\"></i></button>";
    }
    leftHTML += "</div>";

    leftHTML += "</div>";
    leftHTML += "</td></tr>";
    leftHTML += "<tr><td class=streamSection>"

    // Lines & Buddies
    leftHTML += "<div id=myContacts class=\"contactArea cleanScroller\"></div>"
    leftHTML += "<div id=actionArea style=\"display:none\" class=\"contactArea cleanScroller\"></div>"
    
    leftHTML += "</td></tr>";
    leftHTML += "</table>";

    leftSection.html(leftHTML);
    
    // Right Section
    var rightSection = $("<div/>");
    rightSection.attr("id", "rightContent");
    rightSection.attr("class", "rightContent");
    rightSection.attr("style", "margin-left: 320px; height: 100%");

    phone.append(leftSection);
    phone.append(rightSection);

    if(DisableFreeDial == true) $("#BtnFreeDial").hide();
    if(DisableBuddies == true) {
        $("#BtnFindBuddy").hide();
        $("#BtnAddSomeone").hide();
        $("#BtnFreeDial").show();
    }
    
    $("#BtnCreateGroup").hide(); // Not ready for this yet

    $("#UserDID").html(profileUser);
    $("#UserCallID").html(profileName);
    $("#UserProfilePic").css("background-image", "url('"+ getPicture("profilePicture") +"')");
    
    $("#BtnFindBuddy").attr("title", lang.find_someone)
    $("#BtnFindBuddy").on('click', function(event){
        $("#divFindBuddy").toggle();
    });
    $("#txtFindBuddy").attr("placeholder", lang.find_someone)
    $("#txtFindBuddy").on('keyup', function(event){
        UpdateBuddyList();
    });
    $("#BtnFreeDial").attr("title", lang.call)
    $("#BtnFreeDial").on('click', function(event){
        if(UiCustomDialButton == true){
            if(typeof web_hook_dial_out !== 'undefined') {
                web_hook_dial_out(event);
            }
        } else {
            ShowDial();
        }
    });

    $("#BtnAddSomeone").attr("title", lang.add_someone)
    $("#BtnAddSomeone").on('click', function(event){
        if(UiCustomAddBuddy == true){
            if(typeof web_hook_on_add_buddy !== 'undefined') {
                web_hook_on_add_buddy(event);
            }
        } else {
            AddSomeoneWindow();
        }
    });

    $("#BtnVoicemail").hide()
    $("#BtnVoicemail").attr("title", "lang.voicemessages")
    $("#BtnVoicemail").on('click', function(event){
        if(VoicemailDid != ""){
            DialByLine("audio", null, VoicemailDid, "VoiceMail");
        }
    });

    $("#BtnCreateGroup").attr("title", lang.create_group)
    $("#BtnCreateGroup").on('click', function(event){
        CreateGroupWindow();
    });
    $("#SettingsMenu").attr("title", lang.configure_extension)
    $("#SettingsMenu").on('click', function(event){
        if(UiCustomConfigMenu == true){
            if(typeof web_hook_on_config_menu !== 'undefined') {
                web_hook_on_config_menu(event);
            }
        } else {
            ShowMyProfileMenu(this);
        }
    });

    // Register Buttons
    $("#reglink").on('click', Register);
    $("#dereglink").on('click', Unregister);

    // WebRTC Error Page
    $("#WebRtcFailed").on('click', function(){
        Confirm(lang.error_connecting_web_socket, lang.web_socket_error, function(){
            window.open("https://"+ wssServer +":"+ WebSocketPort +"/httpstatus");
        }, null);
    });

    // Take out loading UI
    $(".loading").remove();

    UpdateUI();

    // Show Welcome Screen
    if(welcomeScreen){
        if(localDB.getItem("WelcomeScreenAccept") != "yes"){
            OpenWindow(welcomeScreen, lang.welcome, 480, 600, true, false, lang.accept, function(){
                localDB.setItem("WelcomeScreenAccept", "yes");
                CloseWindow();
                ShowMyProfile();
            }, null, null, null, null);

            return;
        }
    }

    // Check if you account is created
    if(profileUserID == null ){
        ShowMyProfile();
        return; // Don't load any more, after applying settings, the page must reload.
    }

    PopulateBuddyList();

    // Select Last user
    if(localDB.getItem("SelectedBuddy") != null){
        console.log("Selecting previously selected buddy...", localDB.getItem("SelectedBuddy"));
        SelectBuddy(localDB.getItem("SelectedBuddy"));
        UpdateUI();
    }

    PreloadAudioFiles();

    CreateUserAgent();
}

