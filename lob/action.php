<?php
	require 'connect.php';
	
	header('Content-Type: text/html; charset=utf-8');
  

	if(isset($_SESSION['id'])){
		if (isset($_POST['pid'])) {
			$pid = $_POST['pid'];
			$pname = $_POST['pname'];
			$pprice = $_POST['pprice'];
			$pcode = $_POST['pcode'];
			$img = $_POST['pimage'];
			$pqty = $_POST['pqty'];
	  
			$ppid = $_POST['ppid'];
	  
	  
			   $stmt = $con->prepare('SELECT product_code , p_id , COUNT(id) AS cid FROM cart WHERE product_code=? AND uid =?  AND status = 0');
			  $stmt->bind_param('ss',$pid, $_SESSION['id']);
				$stmt->execute();
				$res = $stmt->get_result();
				$r = $res->fetch_assoc();
		  
		  
			  if ($r['cid']<1) {
				  
	  
				  $stmt2 = $con->prepare('SELECT  COUNT(id) AS subid  FROM cart WHERE p_id!=? AND uid =?  AND status = 0');
				  $stmt2->bind_param('ss',$ppid, $_SESSION['id']);
				  $stmt2->execute();
				  $res2 = $stmt2->get_result();
					$r2 = $res2->fetch_assoc();
				  
					  $query = $con->prepare('INSERT INTO cart (product_name,product_price, product_image,qty,total_price,product_code,uid , p_id) VALUES (?,?,?,?,?,?,?,?)');
					  $query->bind_param('ssssssss',$pname,$pprice, $img,$pqty,$pprice,$pid, $_SESSION['id'] , $ppid);
					  $query->execute();
	  
					  
					  echo 1;
				  
				  
				  
				} else {
		  
				  echo 0;
				}
		  }
			  
		  
		  
		  
	  
		  
		  if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
			$stmt = $con->prepare('SELECT * FROM cart WHERE uid='.$_SESSION['id'].' AND status = 0');
			$stmt->execute();
			$stmt->store_result();
			$rows = $stmt->num_rows;
	  
			echo $rows;
		  }
	}
	

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $con->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $con->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $con->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];

	  $data = '';

	  $stmt = $con->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
	  $stmt->execute();
	  $stmt2 = $con->prepare('DELETE FROM cart');
	  $stmt2->execute();
      $mes = "คุณ ".$name ."ได้ทำการสั่งซื้อสินค้าของคุณ\n";
      $mes .= "E-mail ".$email ."\n";
      $mes .= "โทร ".$phone ."\n";
      $mes .= "ยอดรวม ".$grand_total ." บาท\n";
      $res = notify_message($mes);

      $msg = "คุณได้ทำการซื้อสินค้าเรียบร้อยแล้ว \n ขอบพระคุณที่ใช้บริการของเรา lohtoo.com";
      $msg = wordwrap($msg,70);
      mail($email,"ระบบแจ้งเตือนผู้ซื้อสินค้า",$msg);
      
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">ขอบคุณครับ</h1>
								<h2 class="text-success">คุณได้ทำรายการสำเร็จแล้ว กรุณาตรวจสอบข้อมูลผ่าน Email</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;
	}
?>