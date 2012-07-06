<div class="sixteen columns"><?php vpm_content_header(); ?></div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="five columns">
		<div id="notepad"><?php the_content(); ?></div>
	</div>
<?php endwhile; endif; ?>

<div class="eleven columns">
	<table style="width: 100%" id="plans-table">
		<colgroup>
			<col width="25%">
			<col width="17%">
			<col width="17%">
			<col width="23%">
			<col width="17%">
		</colgroup>
		<thead>
			<tr id="plans">
				<th></th>
				<th class="plan old">Old</th>
				<th class="plan">Lite</th>
				<th class="plan pro">Pro</th>
				<th class="plan">Enterprise</th>
			</tr>
		</thead>
		<tbody>
			<tr id="pricing">
				<td class="feature-name">Price (monthly/site)</td>
				<td class="cell feature-section-end old">$5.00</td>
				<td class="cell feature-section-end">$14.99</td>
				<td class="cell feature-section-end pro">$24.99</td>
				<td class="cell feature-section-end">$49.99</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td class="feature-section">Storage</td>
				<td class="cell old"></td>
				<td class="cell"></td>
				<td class="cell pro"></td>
				<td class="cell"></td>
			</tr>
			<tr>
				<td class="feature-name">Space</td>
				<td class="cell old">Limited<sup>1</sup></td>
				<td class="cell">Limited<sup>1</sup></td>
				<td class="cell pro">Unmetered<sup>2</sup></td>
				<td class="cell">Unmetered<sup>2</sup></td>
			</tr>
			<tr>
				<td class="feature-name">Bandwidth</td>
				<td class="cell old">Unmetered<sup>2</sup></td>
				<td class="cell">Unmetered<sup>2</sup></td>
				<td class="cell pro">Unmetered<sup>2</sup></td>
				<td class="cell">Unmetered<sup>2</sup></td>
			</tr>
			<tr>
				<td class="feature-name">Cloud delivery</td>
				<td class="cell old"></td>
				<td class="cell"></td>
				<td class="cell pro">&#x2713;</td>
				<td class="cell">&#x2713;</td>
			</tr>
			<tr>
				<td class="feature-name">Virtual private server</td>
				<td class="cell feature-section-end old"></td>
				<td class="cell feature-section-end"></td>
				<td class="cell feature-section-end pro"></td>
				<td class="cell feature-section-end">&#x2713;</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td class="feature-section">Security</td>
				<td class="cell old"></td>
				<td class="cell"></td>
				<td class="cell pro"></td>
				<td class="cell"></td>
			</tr>
			<tr>
				<td class="feature-name">Intrusion detection</td>
				<td class="cell old">&#x2713;</td>
				<td class="cell">&#x2713;</td>
				<td class="cell pro">&#x2713;</td>
				<td class="cell">&#x2713;</td>
			</tr>
			<tr>
				<td class="feature-name">Managed updates</td>
				<td class="cell old"></td>
				<td class="cell">&#x2713;</td>
				<td class="cell pro">&#x2713;</td>
				<td class="cell">&#x2713;</td>
			</tr>
			<tr>
				<td class="feature-name">WP security scans</td>
				<td class="cell feature-section-end old"></td>
				<td class="cell feature-section-end">Weekly</td>
				<td class="cell feature-section-end pro">Weekly</td>
				<td class="cell feature-section-end">Daily</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td class="feature-section">Backups</td>
				<td class="cell old"></td>
				<td class="cell"></td>
				<td class="cell pro"></td>
				<td class="cell"></td>
			</tr>
			<tr>
				<td class="feature-name">Content</td>
				<td class="cell old">Daily</td>
				<td class="cell">Every 3 hours</td>
				<td class="cell pro">Every 3 hours</td>
				<td class="cell">Hourly</td>
			</tr>
			<tr>
				<td class="feature-name">Databases</td>
				<td class="cell old">Every 3 hours</td>
				<td class="cell">Hourly</td>
				<td class="cell pro">Hourly</td>
				<td class="cell">Hourly</td>
			</tr>
			<tr>
				<td class="feature-name">Physical Backups</td>
				<td class="cell feature-section-end old"></td>
				<td class="cell feature-section-end"><em>Soon</em></td>
				<td class="cell feature-section-end pro"><em>Soon</em></td>
				<td class="cell feature-section-end"><em>Soon</em></td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td class="feature-section">Conveniences</td>
				<td class="cell old"></td>
				<td class="cell"></td>
				<td class="cell pro"></td>
				<td class="cell"></td>
			</tr>
			<tr>
				<td class="feature-name">TypeKit</td>
				<td class="cell old"></td>
				<td class="cell">&#x2713;</td>
				<td class="cell pro">&#x2713;</td>
				<td class="cell">&#x2713;</td>
			</tr>
			<tr>
				<td class="feature-name">Fonts.com</td>
				<td class="cell old"></td>
				<td class="cell"></td>
				<td class="cell pro">&#x2713;</td>
				<td class="cell">&#x2713;</td>
			</tr>
			<tr>
				<td class="feature-name">Integrated analytics</td>
				<td class="cell feature-section-end old"></td>
				<td class="cell feature-section-end"></td>
				<td class="cell feature-section-end pro">&#x2713;</td>
				<td class="cell feature-section-end">&#x2713;</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td class="old"></td>
				<td></td>
				<td class="pro"></td>
				<td></td>
			</tr>
		</tfoot>
	</table>
</div>