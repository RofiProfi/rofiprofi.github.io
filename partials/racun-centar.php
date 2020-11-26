			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p></p>

							<a class="btn btn-primary" href="../korisnik/?action=pocetna">Nazad na kupovinu</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">

							<p>Informacije za posiljku</p>

							<p><?php if (isset($msg4)) echo $msg4; ?></p>
							<div class="form-one">
								<form action="" method="post">

									<input type="text" name="ime" placeholder="Ime *">
									<input type="text" name="prezime" placeholder="Prezime *">
									<input type="text" name="email" placeholder="Email*">
									<input type="text" name="adresa" placeholder="Adresa*">

									<input type="text" name="grad" placeholder="Grad*">
									<input type="text" name="drzava" placeholder="Drzava*">
									<input type="text" name="postanski_broj" placeholder="Postanski broj*">
									<input type="text" name="telefon" placeholder="Broj mobilnog telefona*">
									<span>

										<label><input type="radio" name="kartica" value="visa"> VISA </label>
									</span>
									<span>
										<label><input type="radio" name="kartica" value="mastercard">Mastercard</label>
									</span>
									<span>
										<label><input type="radio" name="kartica" value="paypal">Paypal</label>
									</span>

									<input type="text" name="broj_racuna" placeholder="Broj racuna*">
									<input type="submit" name="action" value="potvrda" href="">Potvrdi

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>