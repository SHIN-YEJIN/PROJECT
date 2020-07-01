<?php
	include "../connect_db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>한밭시그널 : 회원가입</title>
	<style>
	body{
		background-color:#FAFAFA;
	}
	h1{
		color:#58ACFA;
		font-size:2em;
		text-align:center;
		text-shadow:0px 0px 3px black;
	}
	a{
		text-decoration:none;
		color:#58ACFA;
	}
	a:visited{
		color:#58ACFA;
	}
	fieldset{
		border:1px solid gray;
		width:100px;
		margin:0 auto;
	}
	.inph{
		font-size:15px;
		border:1px solid gray;
		height:30px;
	}
	td{
		height:30px;
		font-size:12px;
	}
	.question{
		font-weight:bold;
	}
	</style>
</head>
<body>
	<br>
	<form method="post" action="membership_ok.php" name="join">
	<h1><a href="http://localhost/index.php">HANBAT SIGNAL</a></h1>
			<fieldset>
				<legend align="center">개인정보</legend>
				<table align="center" border="0" cellspacing="0">
					<tr>
						<td class="question">학번</td>
					</tr>
					<tr>
						<td><input type="text" size="26" name="id" class="inph" placeholder="예)20161726"></td>
					</tr>
					<tr>
						<td class="question">비밀번호</td>
					</tr>
					<tr>
						<td><input type="password" size="26" name="password" class="inph"></td>
					</tr>
					<tr>
						<td class="question">이름</td>
					</tr>
					<tr>
						<td><input type="text" size="26" name="name" class="inph"></td>
					</tr>
					<tr>
						<td class="question">출생년도</td>
					</tr>
					<tr>
						<td><input type="text" size="26" name="birth" class="inph" placeholder="예)1993"></td>
					</tr>
					<tr>
						<td class="question">성별</td>
					</tr>
					<tr>
						<td>남자<input type="radio" name="gender" value="남">&nbsp;&nbsp;여자<input type="radio" name="gender" value="여"></td>
					</tr>
					<tr>
						<td class="question">이메일</td>
					</tr>
					<tr>
						<td><input type="email" size="26" name="email" class="inph" placeholder="예)id@host"></td>
					</tr>
				</table>
			</fieldset>
			<br>
			<fieldset>
				<legend align="center">설문조사</legend>
				<table align="center" border="0" cellspacing="0" width="360">
					<tr>
						<td class="question">좋아하는 성별은?</td>
					</tr>
					<tr>
						<td>남자<input type="radio" name="q_gender" value="남">&nbsp;&nbsp;여자<input type="radio" name="q_gender" value="여">&nbsp;&nbsp;상관없다<input type="radio" name="q_gender" value="상관없다"></td>
					</tr>
					<tr>
						<td class="question">본인의 성격은?</td>
					</tr>
					<tr>
						<td>내향적<input type="radio" name="q_character" value="내향적">&nbsp;&nbsp;외향적<input type="radio" name="q_character" value="외향적"></td>
					</tr>
					<tr>
						<td class="question">선호하는 상대방의 성격은?</td>
					</tr>
					<tr>
						<td>내향적<input type="radio" name="q_character_partner" value="내향적">&nbsp;&nbsp;외향적<input type="radio" name="q_character_partner" value="외향적">&nbsp;&nbsp;상관없음<input type="radio" name="q_character_partner" value="상관없음"></td>
					</tr>
					<tr>
						<td class="question">본인의 활동 유형은?</td>
					</tr>
					<tr>
						<td>집돌이/집순이<input type="radio" name="q_type" value="집돌이/집순이">&nbsp;&nbsp;밖돌이/밖순이<input type="radio" name="q_type" value="밖돌이/밖순이"></td>
					</tr>
					<tr>
						<td class="question">선호하는 데이트 장소는?</td>
					</tr>
					<tr>
						<td>카페<input type="radio" name="q_date" value="카페">&nbsp;&nbsp;영화관<input type="radio" name="q_date" value="영화관">&nbsp;&nbsp;PC방<input type="radio" name="q_date" value="PC방">&nbsp;&nbsp;(야구, 축구 등)경기장<input type="radio" name="q_date" value="경기장"></td>
					</tr>
					<tr>
						<td class="question">선호하는 상대방의 연령은?</td>
					</tr>
					<tr>
						<td>연상<input type="radio" name="q_age_partner" value="연상">&nbsp;&nbsp;연하<input type="radio" name="q_age_partner" value="연하">&nbsp;&nbsp;동갑<input type="radio" name="q_age_partner" value="동갑"></td>
					</tr>
					<tr>
						<td class="question">기념일을 잘 챙기는 편입니까?</td>
					</tr>
					<tr>
						<td>그렇다<input type="radio" name="q_anniversary" value="그렇다">&nbsp;&nbsp;아니다<input type="radio" name="q_anniversary" value="아니다"></td>
					</tr>
					<tr>
						<td class="question">흡연 중입니까?</td>
					</tr>
					<tr>
						<td>그렇다<input type="radio" name="q_smoke" value="그렇다">&nbsp;&nbsp;아니다<input type="radio" name="q_smoke" value="아니다"></td>
					</tr>
					<tr>
						<td class="question">상대방의 흡연에 대해 어떻게 생각하십니까?</td>
					</tr>
					<tr>
						<td>상관없음<input type="radio" name="q_smoke_partner" value="상관없음">&nbsp;&nbsp;안 된다<input type="radio" name="q_smoke_partner" value="안 된다"></td>
					</tr>
					<tr>
						<td class="question">음주를 얼마나 자주 하십니까?</td>
					</tr>
					<tr>
						<td>달에 3번 이하<input type="radio" name="q_drink" value="0">&nbsp;&nbsp;주 1회 이하<input type="radio" name="q_drink" value="1">&nbsp;&nbsp;주 2~3<input type="radio" name="q_drink" value="2">&nbsp;&nbsp;주 4회 이상<input type="radio" name="q_drink" value="3"></td>
					</tr>
				</table>
			</fieldset>
			<table align="center">
				<tr>
					<td><input type="submit" value="가입하기" /> <input type="reset" value="다시쓰기" /></td>
				</tr>
			</table>
	</form>
</body>
</html>
