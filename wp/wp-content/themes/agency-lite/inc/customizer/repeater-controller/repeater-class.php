<?php
/**
* Agency Lite customizer repeater class
*
*
* @package Agency Lite
*/

if( class_exists('WP_Customize_Control')):

        
    /**
     * Repeater Custom Control
    */
    class Agency_Lite_Repeater_Controler extends WP_Customize_Control {
    	/**
    	 * The control type.
    	 *
    	 * @access public
    	 * @var string
    	*/
       

        
    	public $type = 'repeater';

    	public $agency_lite_box_label = '';

    	public $agency_lite_box_add_control = '';

    	private $cats = '';
        
        private $pages = '';
        
        private $pags = '';
    	/**
    	 * The fields that each container row will contain.
    	 *
    	 * @access public
    	 * @var array
    	 */
    	public $fields = array();

    	/**
    	 * Repeater drag and drop controler
    	 *
    	 * @since  1.0.0
    	 */
    	public function __construct( $manager, $id, $args = array(), $fields = array() ) {
    		$this->fields = $fields;
    		$this->agency_lite_box_label = $args['agency_lite_box_label'] ;
    		$this->agency_lite_box_add_control = $args['agency_lite_box_add_control'];
    		$this->cats       = get_categories(array( 'hide_empty' => false ));
            $this->pages      = get_pages(array('post_type' => 'page'));
            
            $ftr_args = array( 'post_type'      => 'cn_services', 'posts_per_page' => -1 );
            $ftr_qry  = new WP_Query($ftr_args);
            
            $service_post = array();
            while( $ftr_qry->have_posts() ):
                            $ftr_qry->the_post();
                 $service_post[get_the_ID()] = get_the_title()  ;
            endwhile;

            $this->pags       = $service_post;
            
    		parent::__construct( $manager, $id, $args );
    	}

    	public function render_content() {

    		$values = json_decode($this->value());
    		?>
    		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

    		<?php if($this->description){ ?>
    			<span class="description customize-control-description">
    			<?php echo wp_kses_post($this->description); ?>
    			</span>
    		<?php } ?>

    		<ul class="agency-lite-repeater-field-control-wrap">
    			<?php
    			$this->agency_lite_get_fields();
    			?>
    		</ul>

    		<input type="hidden" <?php esc_attr( $this->link() ); ?> class="agency-lite-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
    		<button type="button" class="button agency-lite-add-control-field"><?php echo esc_html( $this->agency_lite_box_add_control ); ?></button>
    		<?php
    	}

    	private function agency_lite_get_fields(){
    		$fields = $this->fields;
    		$values = json_decode($this->value());

    		if(is_array($values)){
    		foreach($values as $value){
    		?>
    		<li class="agency-lite-repeater-field-control">
    		<h3 class="agency-lite-repeater-field-title"><?php echo esc_html( $this->agency_lite_box_label ); ?></h3>
    		
    		<div class="agency-lite-repeater-fields">
    		<?php
    			foreach ($fields as $key => $field) {
    			$class = isset($field['class']) ? $field['class'] : '';
    			?>
    			<div class="agency-lite-fields agency-lite-type-<?php echo esc_attr($field['type']).' '.esc_attr($class); ?>">
	    			<?php 
	    				$label = isset($field['label']) ? $field['label'] : '';
	    				$description = isset($field['description']) ? $field['description'] : '';
	    				if($field['type'] != 'checkbox'){ ?>
	    					<span class="customize-control-fields"><?php echo esc_html( $label ); ?></span>
	    					<span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
	    				<?php 
	    				}

	    				$new_value = isset($value->$key) ? $value->$key : '';
	    				$default = isset($field['default']) ? $field['default'] : '';

	    				switch ($field['type']) {
	    					case 'text':
	    						echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="text" value="'.esc_attr($new_value).'"/>';
	    						break;
                                
                            case 'number':
	    						echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="number" value="'.esc_attr($new_value).'"/>';
	    						break;
                                
	    					case 'textarea':
	    						echo '<textarea data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">'.esc_textarea($new_value).'</textarea>';
	    						break;

	    					case 'upload':
	    						$image = $image_class= "";
	    						if($new_value){	
	    							$image = '<img src="'.esc_url($new_value).'" style="max-width:100%;"/>';	
	    							$image_class = ' hidden';
	    						}
	    						echo '<div class="agency-lite-fields-wrap">';
	    						echo '<div class="attachment-media-view">';
	    						echo '<div class="placeholder'.esc_attr($image_class).'">';
	    						esc_html_e('No image selected', 'agency-lite');
	    						echo '</div>';
	    						echo '<div class="thumbnail thumbnail-image">';
	    						echo esc_url($image);
	    						echo '</div>';
	    						echo '<div class="actions clearfix">';
	    						echo '<button type="button" class="button agency-lite-delete-button align-left">'.esc_html__('Remove', 'agency-lite').'</button>';
	    						echo '<button type="button" class="button agency-lite-upload-button alignright">'.esc_html__('Select Image', 'agency-lite').'</button>';
	    						echo '<input data-default="'.esc_attr($default).'" class="upload-id" data-name="'.esc_attr($key).'" type="hidden" value="'.esc_attr($new_value).'"/>';
	    						echo '</div>';
	    						echo '</div>';
	    						echo '</div>';							
	    						break;

	    					case 'category':
	    						echo '<select data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
	    						echo '<option value="0">'.esc_html__('Select Category', 'agency-lite').'</option>';
	    						echo '<option value="-1">'.esc_html__('Latest Posts', 'agency-lite').'</option>';
	                                foreach ( $this->cats as $cat )
	                                {
	                                    printf('<option value="%s" %s>%s</option>', esc_attr($cat->term_id), selected($new_value, $cat->term_id, false), esc_html($cat->name));
	                                }
	                      		echo '</select>';
	    						break;

	    					case 'select':
	    						$options = $field['options'];
	    						echo '<select  data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
	                                foreach ( $options as $option => $val )
	                                {
	                                    printf('<option value="%s" %s>%s</option>', esc_attr($option), selected($new_value, $option, false), esc_html($val));
	                                }
	                      		echo '</select>';
	    						break;

	    					case 'checkbox':
	    						echo '<label>';
	    						echo '<input data-default="'.esc_attr($default).'" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'" type="checkbox" '.checked($new_value, 'yes', false).'/>';
	    						echo esc_html( $label );
	    						echo '<span class="description customize-control-description">'.esc_html( $description ).'</span>';
	    						echo '</label>';
	    						break;
	    					
	    					case 'colorpicker':
	    						echo '<input data-default="'.esc_attr($default).'" class="agency-lite-color-picker" data-alpha="true" data-name="'.esc_attr($key).'" type="text" value="'.esc_attr($new_value).'"/>';
	    						break;
                            
                            case 'page':
                                echo '<select data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
	    						echo '<option value="0">'.esc_html__('Select Page', 'agency-lite').'</option>';
	                                foreach ( $this->pages as $page )
	                                {
	                                    printf('<option value="%s" %s>%s</option>', esc_attr($page->ID), selected($new_value, $page->ID, false), esc_html($page->post_title));
	                                }
	                      		echo '</select>';
	    						break;
                                
                             case 'page_cpt':
                                echo '<select data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
	    						echo '<option value="0">'.esc_html__('Select Page', 'agency-lite').'</option>';
                                
	                                foreach ( $this->pags as $pag_ID =>$pag_name )
	                                {
                                        
	                                    printf('<option value="%s" %s>%s</option>', esc_attr($pag_ID), selected($new_value, $pag_ID, false), esc_html($pag_name));
	                                }
	                      		echo '</select>';
	    						break;   
                                
	    					case 'selector':
	    						$options = $field['options'];
	    						echo '<div class="selector-labels">';
	    						foreach ( $options as $option => $val ){
	    							$class = ( $new_value == $option ) ? 'selector-selected': '';
	    							echo '<label class="'.esc_attr($class).'" data-val="'.esc_attr($option).'">';
	    							echo '<img src="'.esc_url($val).'"/>';
	    							echo '</label>'; 
	    						}
	    						echo '</div>';
	    						echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
	    						break;

	    					case 'radio':
	    						$options = $field['options'];
	    						echo '<div class="radio-labels">';
	    						foreach ( $options as $option => $val ){
	    							echo '<label>';
	    							echo '<input value="'.esc_attr($option).'" type="radio" '.checked($new_value, $option, false).'/>';
	    							echo esc_html($val);
	    							echo '</label>'; 
	    						}
	    						echo '</div>';
	    						echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
	    						break;

	    					case 'switch':
	    						$switch = $field['switch'];
	    						$switch_class = ($new_value == 'on') ? 'switch-on' : '';
	    						echo '<div class="onoffswitch '.esc_attr($switch_class).'">';
	    	                        echo '<div class="onoffswitch-inner">';
	    	                            echo '<div class="onoffswitch-active">';
	    	                                echo '<div class="onoffswitch-switch">'.esc_html($switch["on"]).'</div>';
	    	                            echo '</div>';
	    	                            echo '<div class="onoffswitch-inactive">';
	    	                                echo '<div class="onoffswitch-switch">'.esc_html($switch["off"]).'</div>';
	    	                            echo '</div>';
	    	                        echo '</div>';
	    		                echo '</div>';
	    		                echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
	    						break;

	    					case 'range':
	    						$options = $field['options'];
	    						$new_value = $new_value ? $new_value : $options['val'];
	    						echo '<div class="agency-lite-range-slider" >';
	    						echo '<div class="range-input" data-defaultvalue="'. esc_attr($options['val']) .'" data-value="' . esc_attr($new_value) . '" data-min="' . esc_attr($options['min']) . '" data-max="' . esc_attr($options['max']) . '" data-step="' . esc_attr($options['step']) . '"></div>';
	    						echo '<input  class="range-input-selector" type="text" value="'.esc_attr($new_value).'"  data-name="'.esc_attr($key).'"/>';
	    						echo '<span class="unit">' . esc_html($options['unit']) . '</span>';
	    						echo '</div>';
	    						break;

	    					case 'icon':
	    						echo '<div class="agency-lite-selected-icon">';
	    						echo '<i class="'.esc_attr($new_value).'"></i>';
	    						echo '<span><i class="fa fa-chevron-down"></i></span>';
	    						echo '</div>';
	    						echo '<ul class="agency-lite-icon-list clearfix">';
	    						$agency_lite_icons_array = agency_lite_icons_array();
	    						foreach ($agency_lite_icons_array as $agency_lite_font_awesome_icon) {
	    							$icon_class = $new_value == $agency_lite_font_awesome_icon ? 'icon-active' : '';
	    							echo '<li class='.esc_attr($icon_class).'><i class="fa '.esc_attr($agency_lite_font_awesome_icon).'"></i></li>';
	    						}
	    						echo '</ul>';
	    						echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
	    						break;

	    					case 'multicategory':
	    						$new_value_array = !is_array( $new_value ) ? explode( ',', $new_value ) : $new_value;
	    						echo '<ul class="agency-lite-multi-category-list">';
	    						echo '<li><label><input type="checkbox" value="-1" '. checked('-1', $new_value, false ) .'/>'.esc_html__( 'Latest Posts', 'agency-lite' ).'</label></li>';
	    						foreach ( $this->cats as $cat ){
	    							$checked = in_array( $cat->term_id, $new_value_array) ? 'checked="checked"' : '';
	    							echo '<li>';
	    							echo '<label>';
	    	                        echo '<input type="checkbox" value="'.esc_attr($cat->term_id).'" '. esc_attr($checked) .'/>'; 
	    	                        echo esc_html( $cat->name );
	    	                    	echo '</label>';
	    							echo '</li>';
	    						}
	    						echo '</ul>';
	    						echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr(implode( ',', $new_value_array )).'" data-name="'.esc_attr($key).'"/>';
	    						break;

	    					default:
	    						break;
	    				}
	    			?>
    			</div>
    			<?php
    			} ?>

    			<div class="clearfix agency-lite-repeater-footer">
    				<div class="alignright">
    				<a class="agency-lite-repeater-field-remove" href="#remove"><?php esc_html_e('Delete', 'agency-lite') ?></a> |
    				<a class="agency-lite-repeater-field-close" href="#close"><?php esc_html_e('Close', 'agency-lite') ?></a>
    				</div>
    			</div>
    		</div>
    		</li>
    		<?php	
    		}
    		}
    	}

    }

endif;