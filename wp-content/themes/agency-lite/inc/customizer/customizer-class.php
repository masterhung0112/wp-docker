<?php


if(class_exists('WP_Customize_Control')):
    /**
*
*For Switch Enable Disable
*
**/
 class agency_lite_Switch_Control extends WP_Customize_Control{
        public $type = 'switch';
        public $on_off_label = array();

        public function __construct($manager, $id, $args = array() ){
            $this->on_off_label = $args['on_off_label'];
            parent::__construct( $manager, $id, $args );
        }

        public function render_content(){
        ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>

            <?php
                $switch_class = ($this->value() == 'on') ? 'switch-on' : '';
                $on_off_label = $this->on_off_label;
            ?>
            <div class="onoffswitch <?php echo esc_attr($switch_class); ?>">
                <div class="onoffswitch-inner">
                    <div class="onoffswitch-active">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['on']) ?></div>
                    </div>

                    <div class="onoffswitch-inactive">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['off']) ?></div>
                    </div>
                </div>
            </div>
            <input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
    <?php
        }
    }




/** section seperator **/
    class agency_lite_Section_Typo_Seperator extends WP_Customize_Control {
            public function render_content() { ?>
            <div class="section-seperator">
                <?php echo esc_html( $this->label ); ?>
            </div>
        <?php
            }
        }

        
    //to display an instruction
    class agency_lite_Notice_Instruction extends WP_Customize_Control{
        public function render_content() { ?>
        <div class="map-info-wrapper">
            <?php 
                if( $this->label ){ ?>
                    <h4><?php echo esc_html( $this->label ); ?></h4>
                <?php }
            if( $this->description ){ ?>
            <div class="info-message">
                <?php echo wp_kses_post($this->description); ?>
            </div>
            <?php } ?>
        </div>    
           
        
    <?php        
        }
    }


     /** Section background color picker field **/
    class Agency_Lite_Bg_Color_Picker extends WP_Customize_Control {
        public function render_content() { ?>
        <span class="customize-control-title">
            <?php echo esc_html( $this->label ); ?>
        </span>
        <span class="desc clearfix">
            <?php echo esc_html( $this->description ); ?>
        </span>
        <input type='text' id="agency-lite-color-picker" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
    <?php
        }
    }

    /**
    *
    */
    //Sidebar options
    class Agency_Lite_Customize_Radioimage_Control extends WP_Customize_Control {
        public function render_content() {
            if ( empty( $this->choices ) )
            return;
            $name = '_customize-radio-' . $this->id; ?>

            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <ul class="controls" id ="agency-lite-sidebar-img-container">
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                            <?php
                             $class = ($this->value() == $value)?'agency-lite-sidebar-radio-img-selected agency-lite-sidebar-radio-img-img':'agency-lite-sidebar-radio-img-img';
                            ?>
                            <li>
                                    <label>
                                            <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                                            <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo esc_attr($class); ?>'  />
                                    </label>
                            </li>
                    <?php endforeach; ?>
            </ul>
                <?php } }

endif;









