<?php namespace SuperBackGroundAdmin { ?>
       <div >
  	    <div class="meta-box-sortables ui-sortable">
         <div class="postbox">
		 <button class="handlediv button-link" aria-expanded="true" type="button">
			<span class="screen-reader-text">Toggle panel: <?php echo getAdminTitle(); ?></span>
			<span class="toggle-indicator" aria-hidden="true" ></span>
		</button>
		<h2 class="hndle ui-sortable-handle">
			<span><?php echo getAdminTitle(); ?></span>
		</h2>		
		<div class="inside">
          <form method="post" action="options.php">
          <?php 
				settings_fields( settingsHandle() ); 
           
                $urlRef     =   optionMediaName         ();
                $alphaRef   =   optionAlphaName         ();
                $overARef   =   optionOverAlphaName     ();
                $overUrlRef =   optionOverUrlName       ();
            ?>
           <table border=0><tr>
           <td><label>Media URL</label></td>
           <td><input 
                name        ="<?php echo  $urlRef               ?>" 
                value       ="<?php echo getOptionMedia();      ?>"
                type        ="text" 
                class       ="mediaUrl" 
                size        =96
                placeholder ="please enter media url"
                required 
                />
          </td>     
           <td>
            <input 
                class       ="mediaChooseButton button-secondary" 
                type        ="button" 
                value       ="<?php echo mediaButtonLabel();    ?>"
                />
          </td>
         </tr><tr>
           <td><label>Page Opacity</label></td>
           <td><input 
                name        ="<?php echo  $alphaRef             ?>" 
                value       ="<?php echo getOptionAlpha();      ?>"
                type        =number" 
                min         ="0.01" 
                max         ="1" 
                step        ="0.01" 
                placeholder ="(0.01 -> 1)"
                required 
                />
          </td> 
         </tr><tr>
           <td><label>Overlay Image URL</label></td>
           <td><input 
                name        ="<?php echo  $overUrlRef           ?>" 
                value       ="<?php echo getOptionOverUrl();    ?>"
				class       ="bgOverlay"
                type        =text" 
                size        =96
                placeholder ="enter the URL of an Image to be used as overlay"
                />
          </td>
         </tr><tr>
           <td><label>Overlay Opacity</label></td>
           <td><input 
                name        ="<?php echo  $overARef             ?>" 
                value       ="<?php echo getOptionOverAlpha();  ?>"
				class       ="bgOverlayAlpha"
                type        =number" 
                min         ="0.01" 
                max         ="1" 
                step        ="0.01" 
                placeholder ="(0.01 -> 1)"
                required 
                />
          </td> 
         </tr><tr>
           <td></td>
           <td></td>
           <td class="submit">
            <input 
                type        ="submit" 
                class       ="button-primary" 
                value       ="<?php echo bttnSaveOptionLabel(); ?>" 
                />
          </td>
         </tr>
        </table>
         <p>
          <div id=super-bg-preview-div></div>
       </p>  
	  </div>
     </form>
    </div>
   </div>
  </div> 
<?php } ?>
