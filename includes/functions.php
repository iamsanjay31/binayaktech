<?php 
	function create_connection()
	{
		$con = mysqli_connect('localhost','root','','binayaktech');
		return $con;
	}

	function get_slider()
	{
		$con = create_connection();
		$sql = "SELECT * FROM gallery";
		$res = mysqli_query($con,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res))
		{
			$result[] = $row;
		}
		return $result;
	}

	function get_products()
	{
		$con = create_connection();
		$sql = "SELECT * FROM products";
		$res = mysqli_query($con,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res))
		{
			$result[] = $row;
		}
		return $result;
	}

	function get_clients()
	{
		$con = create_connection();
		$sql = "SELECT * FROM clients";
		$res = mysqli_query($con,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res))
		{
			$result[] = $row;
		}
		return $result;
	}

	function get_portfolios()
	{
		$con = create_connection();
		$sql = "SELECT * FROM portfolio";
		$res = mysqli_query($con,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res))
		{
			$result[] = $row;
		}
		return $result;
	}

	function get_testimonials()
	{
		$con = create_connection();
		$sql = "SELECT * FROM testimonials";
		$res = mysqli_query($con,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res))
		{
			$result[] = $row;
		}
		return $result;
	}

	function get_members()
	{
		$con = create_connection();
		$sql = "SELECT * FROM staffs";
		$res = mysqli_query($con,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res))
		{
			$result[] = $row;
		}
		return $result;
	}

	function get_pages()
	{
		$con = create_connection();
		$sql = "SELECT * FROM pages";
		$res = mysqli_query($con,$sql);
		$result = array();
		while($row = mysqli_fetch_assoc($res))
		{
			$result[] = $row;
		}
		return $result;
	}

	function get_page_single($id)
	{
		$con = create_connection();
		$sql = "SELECT * FROM pages WHERE pages_id = $id";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
?>