<?php

	date_default_timezone_set('Asia/Manila');
	Class Model {
		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "cjce";
		private $conn;

		public function __construct() {
			try {
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo "Connection failed" . $e->getMessage();
			}
		}

		public function addUser($name, $email, $address, $phone, $car, $password, $access) {
			$query = "INSERT INTO client_info (name, email, address, phone, car, password, access) VALUES (?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssss', $name, $email, $address, $phone, $car, $password, $access);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function displayAdmin() {
			$data = null;

			$query = "SELECT * FROM admin_info WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $_SESSION['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayEmployees() {
			$data = null;
			$query = "SELECT * FROM employee_info WHERE access = 3 AND status = 0 ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				// $stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayCar() {
			$data = null;
			$query = "SELECT * FROM cars ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				// $stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayInEmployees() {
			$data = null;
			$query = "SELECT * FROM employee_info WHERE access = 3 AND status = 1 ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				// $stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}


		public function displayWalkin() {
			$data = null;
			$query = "SELECT * FROM walkin ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				// $stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}


		public function displayPayment() {
			$data = null;
			$query = "SELECT * FROM payment ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				// $stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		

		public function addEmployee($emp_no, $fullname, $email, $address, $password, $access, $number, $nationality, $gender, $position, $age, $placebirth, $datestarted) {
			$query = "INSERT INTO employee_info (employee_no, name, email, address, password, access, mobile_no, nationality, gender, position, age, placeofbirth, datestarted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssssssssss', $emp_no, $fullname, $email, $address, $password, $access, $number, $nationality, $gender, $position, $age, $placebirth, $datestarted);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addCar($car, $plate) {
			$query = "INSERT INTO cars (car, plate_no) VALUES (?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $car, $plate);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addWalk($name, $email, $address, $repair, $brand, $model, $schedule, $time, $phone) {
			$query = "INSERT INTO walkin (name, email, address, repair, brand, model, schedule, time, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssssss', $name, $email, $address, $repair, $brand, $model, $schedule, $time, $phone);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addRepair($title, $qty, $price, $des) {
			$query = "INSERT INTO repair (ps, qty, price, description) VALUES (?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssss', $title, $price, $qty, $des);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addPms($title, $qty, $price, $des) {
			$query = "INSERT INTO pms (ps, qty, price, description) VALUES (?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssss', $title, $price, $qty, $des);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addTask($number, $client, $date, $service, $mechanic, $electrician) {
			$query = "INSERT INTO employee_task (no, client, date, service, mechanic, electrician) VALUES (?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssss', $number, $client, $date, $service, $mechanic, $electrician);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function updateRepair($emp_ps, $new_qty, $new_price,  $edit_id) {
			$query = "UPDATE repair SET ps = ?, qty = ?, price = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssi', $emp_ps, $new_qty, $new_price,  $edit_id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function updatePms($emp_ps, $new_qty, $new_price,  $edit_id) {
			$query = "UPDATE pms SET ps = ?, qty = ?, price = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssi', $emp_ps, $new_qty, $new_price,  $edit_id);
				$stmt->execute();
				$stmt->close();

			}
		}

		
		public function updateEmployee($emp_no, $new_name, $new_email, $new_address, $new_password, $new_number, $new_nationality, $new_gender, $new_position, $new_age, $new_birth, $new_started, $edit_id) {
			$query = "UPDATE employee_info SET employee_no = ?, name = ?, email = ?, address = ?, password = ?, mobile_no = ?, nationality = ?, gender = ?, position = ?, age = ?, placeofbirth = ?, datestarted = ?  WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssssssssssi', $emp_no, $new_name, $new_email, $new_address, $new_password, $new_number, $new_nationality, $new_gender, $new_position, $new_age, $new_birth, $new_started, $edit_id);
				$stmt->execute();
				$stmt->close();

			}
		}




	

		public function addAppointment($client, $brand, $model, $pms, $schedule, $repair, $time, $color, $type) {
			$query = "INSERT INTO appointment (client_id, brand, model, pms, schedule, repair, time, color, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssssss', $client, $brand, $model, $pms, $schedule, $repair, $time, $color, $type);
				$stmt->execute();
				$stmt->close();

			}
		}













	



    }


?>