<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Our Quote for Courier Services - Delivery Times | Washington DC Courier Same Day Delivery</title>
<meta name="description" content="Washington Express, Sample Quote Prices for Local Delivery and Courier Service for Washington, DC, including courier, messenger, express freight, air freight, capitol hill deliveries, congressional seatholding, and visa and authentication services" />
<meta name="keywords" content="Courier, courier service, dc courier, dc courier company, washington dc courier company, messenger, messenger company, dc messenger company, washington dc messenger company, delivery, delivery company, dc delivery company, washington dc delivery company, washington courier, washington courier company, courier service, messenger service, delivery service, bicycle courier, bicycle delivery, bicycle messenger, bike courier, bike delivery, bike messenger, rush service, fast delivery, virginia delivery, maryland delivery, virginia courier, maryland courier, virginia messenger, maryland messenger, same day delivery, same day messenger, same day courier, on demand, on-demand, on demand delivery, on-demand delivery, on demand messenger, on-demand messenger, messenger delivery, on demand courier, on-demand courier, local delivery, local courier, local messenger, local delivery dc, local courier dc, local messenger dc, local freight, local freight delivery, local freight dc, local freight delivery dc, urgent, real time." />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/js/preload.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript" src="http://syntace-094.com/js/36069.js"></script>
<noscript><img src="http://syntace-094.com/36069.png" style="display:none;" /></noscript>

<link href="/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!--begin middle//-->
<table width="971" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="16">&nbsp;</td>
    <td width="955">

    <!--begin body//-->
    <table width="955" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="114" valign="bottom" background="/img/bg-bluebar.jpg"><br />
      <table width="700" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="20">&nbsp;</td>
          <td width="238" class="section">Our Services</td>
          <td><img src="/img/arrow-blue.gif" width="8" height="13" /> <a href="/default.asp" class="white">Washington Express</a>&nbsp;&nbsp; <img src="/img/arrow-blue.gif" width="8" height="13" /> <a href="/services/" class="white">Our Services</a>&nbsp;&nbsp; <img src="/img/arrow-blue.gif" width="8" height="13" /> <a href="/services/prices.asp" class="white"><b>Service Price Quote</b></a></td>
        </tr>
      </table>
      <br /></td>
  </tr>
</table>

    <table width="955" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bg-body">
  <tr>
    <td width="20" valign="bottom"><img src="/img/x.gif" width="20" height="1" /></td>
    <td width="206" valign="top"><br /><br />
          <table width="205" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="23" background="/img/bg-bluebar.gif" bgcolor="#0263B3" class="white">&nbsp;&nbsp;<b>Our Services</b></td>
          </tr>
          <tr>
            <td height="23" class="white">

                        </td>
          </tr>
        </table><br />

        <table width="206" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="grey"></td>
  </tr>
</table><br />

        <br /></td>
    <td width="32" valign="bottom"><img src="/img/x.gif" width="32" height="1" /></td>
    <td valign="top">
    <div id="TextArea">


            <h3>Your Price Quote
            <%
            s1=request.Form.Item("FromAddress2")
            s2=request.Form.Item("ToAddress2")
            if s1="Street" then s1=""
            if s2="Street" then s2=""

            z1=request.Form.Item("FromZip2")
            z2=request.Form.Item("ToZip2")
            if z1="Zip" then z1=""
            if z2="Zip" then z2=""

            fpieces=request.Form.Item("fpieces")
            fweight=request.Form.Item("fweight")
			
			em=request.form("EmailAddress")
			If em <> "" Then
			Dim params, url, urlEmail
			params = "?origin=" & s1 & " " & z1 & "&destination=" & s2 & " " & z2 & "&email=" & em
			url = "http://webicise.com/Solve360/WEX/QuickQuote/Solve360ContactSave.php" & params
			urlEmail = "http://webicise.com/Solve360/WEX/QuickQuote/WEXMail.php?email=" & em
			
			Set XmlObj2 = createobject("Microsoft.XMLHTTP")
				XmlObj2.open "GET", url, false
				XmlObj2.send
			Set XmlObj2 = nothing
			
			Set XmlObj3 = createobject("Microsoft.XMLHTTP")
				XmlObj3.open "GET", urlEmail, false
				XmlObj3.send
			Set XmlObj3 = nothing
			
			%>
			<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
			<script type="text/javascript">
				$.ajax({ 'url': '<% Response.Write url %>' });
				$.ajax({ 'url': '<% Response.Write urlEmail %>' });
			</script>
			<%
			End If
			%>
            </h3>

            <style type="text/css">
                	.row {
                		overflow: hidden;
                		display: none;
                		margin-bottom: 8px;
                	}
                	.row.head {
                		font-weight: bold;
                		display: block;
                	}
                	.row .col:nth-child(3) { width: 29%; }
                	.row .col:nth-child(4) { display: none; }
                	.row .col {
                		float: left;
                		width: 25%;
                	}
                  .row .col.col-Description { display: none !important; }
                	</style>

            <p>Below is your price quote for local delivery and courier service for pick up from <strong><%Response.write(s1)%>&nbsp;<%Response.write(z1)%> </strong> to<br />
              <strong><%Response.write(s2)%>&nbsp;<%Response.write(z2)%></strong>.</p>
              <%
              z1=request.Form.Item("FromZip2")
              z2=request.Form.Item("ToZip2")
			  vehicle=request.Form.Item("jumpMenu33")
			  packageType=request.Form.Item("jumpMenu3")
        serviceType=request.Form.Item("jumpMenu33")
              response.write(GetQuote(z1,z2, s1, s2, vehicle, packageType, serviceType, fweight, fpieces))
              %>
            <p>This is an estimate of <strong>introductory rates only</strong>, for a regular service delivery during normal business hours, and does not include any applicable tax or other surcharges.  Any surcharges or other modifiers are not available using this complimentary price quote service.  <strong>This price is for new customer accounts only and does not apply to credit card orders.</strong> A minimum monthly volume must be established to open a customer account.</p>
<p><strong>To&nbsp;open an account and   become a Washington Express customer, please call us<br />
              at (301) 210-3500.</strong></p>
            <p><a href="prices.asp">Get Another Quote</a></p>
            </div>
            </td>
    <td width="25" valign="bottom"><img src="/img/x.gif" width="25" height="1" /></td>
  </tr>
</table>
    <!--end body//-->

    </td>
  </tr>
</table>

</body>
</html>
<%

Function GetQuote(sZipFrom, sZipTo, sAddrFrom, sAddrTo, vehicle, packageType, serviceType, weight, pieces)

on error resume next

'response.write year(now) & "-" & string(2-len(month(now)),"0") & month(now) & "-" & string(2-len(day(now)),"0") & day(now) & "T16:00:00Z"
dim dt1, dt2
dt1 = year(now) & "-" & string(2-len(month(now)),"0") & month(now) & "-" & string(2-len(day(now)),"0") & day(now) & "T14:30:00Z"
dt2 = year(now) & "-" & string(2-len(month(now)),"0") & month(now) & "-" & string(2-len(day(now)),"0") & day(now) & "T17:45:00Z"

dim packageTypeValue
packageTypeValue = "Env-Package-Book"
if packageType = 2 then packageTypeValue = "Roll-Bag-Small Item"
if packageType = 3 then packageTypeValue = "Box-Trunk-Other"

'Response.Write packageType
'Response.Write "<br/>"
'Response.Write packageTypeValue
'Response.Write "<br/>"
'Response.End
	
set oXMLDOM = Server.CreateObject("Microsoft.XMLDOM")
set oRoot = oXMLDOM.createNode("element","SOAP:Envelope","http://schemas.xmlsoap.org/soap/envelope/")
set oBody = oXMLDOM.createNode("element","SOAP:Body","http://schemas.xmlsoap.org/soap/envelope/")
set oMethod = oXMLDOM.createNode("element","m:Login","http://www.e-courier.com/software/schema/public/")

oBody.appendChild oMethod
oRoot.appendChild oBody
oXMLDOM.appendChild oRoot
oMethod.setAttribute "UserName","test4pete"
oMethod.setAttribute "Password","test4pete"
oMethod.setAttribute "WebSite","wex"

set xmlhttp = server.createobject("Microsoft.XMLHTTP")
sURl = "http://www.e-courier.com/ecourier/software/xml/XML.asp"
sUrl="http://www.wex.e-courier.com/ecourier/software/xml/xml.asp"
xmlhttp.open "POST",sURL,false
xmlhttp.send oXMLDom
set oResponse = xmlhttp.responseXML.documentElement.selectSingleNode(".//m:LoginResponse")
UserGUID = oResponse.getAttribute("UserGUID")
'Response.Write UserGUID

set oXMLDom = nothing
set xmlhttp = nothing
set oRoot=nothing
set oBody=nothing
set oMethod=nothing


'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
'on error goto 0
set oXMLDOM = Server.CreateObject("Microsoft.XMLDOM")
set oRoot = oXMLDOM.createNode("element","SOAP:Envelope","http://schemas.xmlsoap.org/soap/envelope/")
set oBody = oXMLDOM.createNode("element","SOAP:Body","http://schemas.xmlsoap.org/soap/envelope/")
set oMethod = oXMLDOM.createNode("element","m:QuoteOrder","http://www.e-courier.com/software/schema/public/")
set oOrder = oXMLDOM.createNode("element","m:Order","http://www.e-courier.com/software/schema/public/")

'set oOrder=oXMLDOM.createNode(1,"order","")
set oStops=oXMLDOM.createNode(1,"Stops","")
set oStop=oXMLDOM.createNode(1,"Stop","")
set oStopD=oXMLDOM.createNode(1,"Stop","")

oBody.appendChild oMethod
oRoot.appendChild oBody
oXMLDOM.appendChild oRoot
oMethod.setAttribute "UserGUID",UserGUID
oMethod.setAttribute "WebSite","wex"

'oOrder.setAttribute "Percent1","144"
'oOrder.setAttribute "Percent2","2"
'oOrder.setAttribute "Weight","25000"
'oOrder.setAttribute "Pieces","4000"
oOrder.setAttribute "SiteID","1"
oOrder.setAttribute "VehicleTypeID", vehicle
oOrder.setAttribute "ServiceTypeID", serviceType
oOrder.setAttribute "PackageType", packageTypeValue
oOrder.setAttribute "PackageTypeID", packageType

oOrder.setAttribute "CustomerCode","17970"

oOrder.setAttribute "Weight", weight
oOrder.setAttribute "Pieces", pieces

oStop.setAttribute "Sequence","1"
oStop.setAttribute "EarlyDateTime",dt1
oStop.setAttribute "LateDateTime",dt2
oStop.setAttribute "TimeOfServiceCode","1"
oStop.setAttribute "Zip",sZipFrom
oStop.setAttribute "Address",sAddrFrom
'oStop.setAttribute "CustomerCode",�17970�
oStop.setAttribute "State",GetState(sZipFrom)
'oStop.setAttribute "State",""

oStopD.setAttribute "Sequence","2"
oStop.setAttribute "EarlyDateTime",dt1
oStop.setAttribute "LateDateTime",dt2
oStop.setAttribute "TimeOfServiceCode","1"
oStopD.setAttribute "Zip",sZipTo
oStopD.setAttribute "Address",sAddrTo
'oStopD.setAttribute "CustomerCode",�17970�
oStopD.setAttribute "State",GetState(sZipTo)
'oStopD.setAttribute "State",""

oOrder.Appendchild oStops
oStops.Appendchild oStop
oStops.Appendchild oStopD

oMethod.AppendChild oOrder

'Response.Write("<BR><TEXTAREA cols=60 rows=20>" & oRoot.xml & "</TEXTAREA>")

'Response.Write("after")
'Response.Write(oXMLDOM.xml)
'Response.Write("before")
'Response.End

set xmlhttp = server.createobject("Microsoft.XMLHTTP")
sURl = "http://www.e-courier.com/ecourier/software/xml/XML.asp"
sUrl="http://www.wex.e-courier.com/ecourier/software/xml/xml.asp"
xmlhttp.open "POST",sURL,false
xmlhttp.send oXMLDom
set oResponse = xmlhttp.responseXML.documentElement.selectSingleNode(".//m:QuoteOrderResponse")

'Response.Write("after response")
'Response.Write(oResponse.xml)
'Response.Write("before response")
'Response.End

'Response.Write("<BR><TEXTAREA cols=60 rows=20>" & xmlhttp.ResponseXML.XML & "</TEXTAREA>")
'Response.End
'Response.Write "<BR>"
dim sRetVal
'dim sRate
dim iRateFound
iRateFound=99
'iCurrRate=0

sRetVal="Error Getting Quote"
'Response.Write oResponse.childNodes.length

Response.Write "<div class='row head'><div class='col'>Service</div><div class='col col-Description'>Description</div><div class='col'>ReadyDateTime</div><div class='col'>DueDateTime</div><div class='col'>Amount Charged</div></div>"

For i = 0 To (oResponse.childNodes.length - 1)
      'if
	  Response.Write "<div class='row'>"
      for j=0 to oResponse.childnodes.item(i).attributes.length -1

        'Response.Write (oResponse.childNodes.Item(i).Attributes(j).Name & "<BR>")
        'if oResponse.childNodes.Item(i).Attributes(j).Name="Service" then
                'sRate=oResponse.childNodes.Item(i).Attributes(j).Text
                'Response.Write (oResponse.childNodes.Item(i).Attributes(j).Text & "<BR>")
        'end if
        'if oResponse.childNodes.Item(i).Attributes(j).Name="AmountCharged" then

            'if sRate="B1H" then iCurrRate=1
            'if sRate="H90" then iCurrRate=2
            'if sRate="V2H" then iCurrRate=3
            'if sRate="S2H" then iCurrRate=1
            'if sRate="S3H" then iCurrRate=4

            'if sRate="S2H" then

            'end if
                'if sRate="H90" or sRate="B1H" or sRate="S2H" or sRate="V2H" or sRate="S3H" then
                    'if iRateFound > 1 and iRateFound > iCurrRate then
                        'sRetVal="<small>" & sRate & "</small> - " & oResponse.childNodes.Item(i).Attributes(j).Text
                        sRetVal=oResponse.childNodes.Item(i).Attributes(j).Text
                        'if sRate="B1H" then iRateFound=1
                        'if sRate="H90" then iRateFound=2
                        'if sRate="V2H" then iRateFound=3
                        'if sRate="S2H" then iRateFound=1
                        'if sRate="S3H" then iRateFound=4
                    'end if
                'end if

        'end if
		Response.Write "<div class='col col-" & oResponse.childNodes.Item(i).Attributes(j).Name & "'>"
        Response.Write oResponse.childNodes.Item(i).Attributes(j).Text
		'Response.Write "<br/>"
        'Response.Write oResponse.childNodes.Item(i).Attributes(j).Name
		Response.Write "</div>"
		
      next
      'Response.Write "<BR><BR>"
	  Response.Write "</div>"
Next
GetQuote=sRetVal
if sRetVal<>"Error Getting Quote" then
	GetQuote=""
else 
	GetQuote="<strong>Service is not available via the web for the criteria you have entered. If you have questions, please call our office at 800-939-5463.</strong><style type='text/css'>.row.head { display: none; }</style>"
end if

'Response.Write("<BR><TEXTAREA cols=60 rows=20>" & oResponse.XML & "</TEXTAREA>")
'Response.Write("<BR><TEXTAREA cols=60 rows=20>" & oResponse.value & "</TEXTAREA>")

'Response.Write "STATE: " & GetState("22312")

set oResponse = xmlhttp.responseXML.documentElement.selectSingleNode(".//m:QuoteOrderResponse")

If request.form("email") <> "" Then
		set XmlObj = createobject("Microsoft.XMLHTTP")
		Dim params, mailBody
		params = "?origin=" & forigin & "&destination=" & fdestination & "&pieces=" & fpieces & "&weight=" & fweight & "&date=" & fdate & "&track2=" & ftrack2 & "&jumpMenu=" & fjumpmenu & "&email=" & femail & "&jumpMenu2=" & fjumpmenu2 & "&jumpMenu22=" & fjumpmenu22
			XmlObj.open "GET", "http://www.webicise.com/Solve360/WEX/QuickQuote/Solve360ContactSave.php" & params, false
			XmlObj.send
		Set XmlObj = nothing

		mailBody = "<HTML><body><table width=800>"
		mailBody = mailBody & "<tr><td valign=top><img src='http://www.washingtonexpress.com/img/logo1.png' alt='Washington Express'></td></tr>"
		mailBody = mailBody & "<tr><td><table width='100%'><tr align=center><td valign=top><a href='http://www.washingtonexpress.com' title='Quick Quote'>QUICK QUOTE</a> | <a href='http://www.washingtonexpress.com/services/' title='Services'>OUR SERVICES</a> | <a href='http://www.washingtonexpress.com/services/couriernewaccount.asp' title='Open an Account'>OPEN ACCOUNT</a> | <a href='http://www.washingtonexpress.com/services/placecourierorder.asp' title='Order Now'>ORDER NOW</a> | <a href='http://www.washingtonexpress.com/about/' title='About us'>ABOUT US</a> | <a href='http://www.washingtonexpress.com/default.asp' title='Tracking'>TRACKING</a> | <a href='http://www.washingtonexpress.com/about/news.asp' title='News'>NEWS</a></td></tr></table></td></tr>"
		mailBody = mailBody & "<tr align=center><td valign=top><font color=#004193 size=8>Save Time & Gas</font></td></tr>"
		mailBody = mailBody & "<tr align=center><td valign=top><a href='http://www.washingtonexpress.com/services/placecourierorder.asp' title='Order Now'><img src='http://www.washingtonexpress.com/img/WEX_email.png' border=0 alt='Order Now and get 25% off'></a></td></tr>"
		mailBody = MailBody & "<tr align=center><td><font color=#004193>You recently requested a same day courier service quote at WashingtonExpress.com.  Place an order for your<br>1st courier delivery within the next 7 days and get 25% off with the coupon code WEX100.<br><br>If you place an order online; place the code in the reference field on the order form and 25% will be<br>deducted from the order before final charges.</font></td></tr>"
		mailBody = mailBody & "<tr><td><table width='100%' bgcolor=#0A8C3B><tr align=center><td><font color=#FFFFFF>Washington Express* | 800-939-546 | 12240 Indian Creek Court #100 | Beltsville, MD | 20705</font></td valign=right><font color=#FFFFFF><strong>FOLLOW US:&nbsp;&nbsp;&nbsp;</strong></font><a href='https://www.facebook.com/pages/Washington-Express-LLC/126219504084248' title='Facebook'><img src='http://www.1-800courier.com/img/facebook1.png' border=0 alt='Facebook'></a>&nbsp;&nbsp;<a href='http://www.washingtonexpress.com/about/news.asp' title='News'><img src='http://www.1-800courier.com/img/blogger.png'border=0 width=16 height=16 alt='News'></a><td></td></tr></table></td></tr>"
		mailBody = mailBody & "<tr><td>* A-1 Express Delivery Service, Inc dba 1-800Courier.com</td></tr>"
		mailBody = mailBody & "<tr><td>If you would like to unsubscribe and stop receiving these emails <a href=mailto:Ashley.montoya@washingtonexpress.com?subject=Unsubscribe%20to%20WEX%20QuickQuotes>click here</a></td></tr>"
		mailBody = mailBody & "</td></tr></table></body></html>"
		
		'Send Emails
		Set myMail = CreateObject("CDO.Message")
		myMail.Subject = "Washington Express QuickQuote"
		myMail.From = "Washington Express <Ashley.montoya@washingtonexpress.com>"
				
		Dim mailTo
		mailTo = femail
				
		myMail.To = mailTo  
		myMail.HTMLBody = mailBody
		myMail.Send
		set myMail = nothing
			
    End If

set oXMLDom = nothing
set xmlhttp = nothing

end function

function GetState(sZip)
'Dimension variables
Dim sRet
Dim adoCon         'Holds the Database Connection Object
Dim rsGuestbook    'Holds the recordset for the records in the database
Dim strSQL         'Holds the SQL query to query the database
'Create an ADO connection object
Set adoCon = Server.CreateObject("ADODB.Connection")
sRet=""
'Set an active connection to the Connection object using a DSN-less connection
adoCon.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("ZipCodes.mdb")

'Create an ADO recordset object
Set rsZips = Server.CreateObject("ADODB.Recordset")
'Initialise the strSQL variable with an SQL statement to query the database
strSQL = "SELECT [State Abbreviation] from [Show All ZIP Codes] where [Zip Code]=""" & sZip & """;"

'Open the recordset with the SQL query
rsZips.Open strSQL, adoCon

'Write the HTML to display the current record in the recordset

sRet=rsZips(0)

'Reset server objects
rsZips.Close
Set rsZips = Nothing
Set adoCon = Nothing
GetState=sRet
end function

function GetStateService(sZip)


Set SoapRequest = Server.CreateObject("MSXML2.XMLHTTP")
Set myXML =Server.CreateObject("MSXML.DOMDocument")
myXML.Async=False
SoapURL = "http://wslite.strikeiron.com/zipcodeinfolite01/ZIPCodeInfoLite.asmx/GetZIPCodeInfo?ZIPCode=" & sZip
SoapRequest.Open "GET",SoapURL , False
SoapRequest.Send()


if Not myXML.load(SoapRequest.responseXML) then 'an Error loading XML
        returnString = ""
    Else    'parse the XML

        Dim nodesURL
        Dim nodesName
        Dim nodesDateUpdated
        Dim nodesDomain
        Dim NumOfNodes
        Dim ResourceList
        Dim i

        REM -- The XML Nodes are CASE SENSITIVVE!
        Set nodesURL=myXML.documentElement.selectNodes("//ZIPCodeData")
        Set nodesName=myXML.documentElement.selectNodes("//State")

        REM -- uncomment the following lines if we want to access the DataUpdated and the Domain Nodes
        REM --Set nodesDateUpdated = myXML.documentElement.selectNodes("//DateUpdated")
        REM --Set nodesDomain = myXML.documentElement.selectNodes("//Domain")

        REM -- the number of nodes in the list
        NumOfNodes = nodesURL.Length
        returnString=nodesName(0).text

        Set nodesURL = Nothing
        Set nodesName = Nothing
    End If

    Set SoapRequest = Nothing
    Set myXML = Nothing


    GetState = returnString



end function



%>