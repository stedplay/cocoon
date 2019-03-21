/**
 * Cocoon Blocks
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

const { Fragment } = wp.element;
const { __ } = wp.i18n;
const { registerFormatType, toggleFormat } = wp.richText;
const { BlockControls, RichTextShortcut, RichTextToolbarButton } = wp.editor;
const { Toolbar, DropdownMenu } = wp.components;
const THEME_NAME = 'cocoon';
const FORMAT_TYPE_NAME = 'cocoon-blocks/letter-colors';
//import { Toolbar, DropdownMenu } from '@wordpress/components';
//import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

//console.log('DropdownMenu');

registerFormatType( FORMAT_TYPE_NAME, {
  title: __( '文字', THEME_NAME ),
  tagName: 'span',
  className: 'letters',
  edit( { isActive, value, onChange } ) {
    //const onToggle = () => onChange( toggleFormat( value, { type: FORMAT_TYPE_NAME } ) );

    //console.log(isActive);
    //console.log(value);
    //console.log(onChange);
    //console.log(activeAttributes);
    var cursolPositionObject = value.formats[value.start];
    var type = cursolPositionObject ? cursolPositionObject[0].type : '';
    // console.log(value.formats[value.start]);
    // console.log(type);

    return (
      <Fragment>
        <BlockControls>
          <Toolbar>
            <DropdownMenu
              icon="editor-textcolor"
              label={__( '文字', THEME_NAME )}
              className='letters'
              controls={ [
                  {
                      title: __( '太字（boldクラス指定）', THEME_NAME ),
                      icon: 'editor-bold',
                      className: 'bold',
                      isActive: type === 'cocoon-blocks/bold',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/bold' } ) )
                  },
                  {
                      title: __( '赤色', THEME_NAME ),
                      icon: 'editor-textcolor',
                      isActive: type === 'cocoon-blocks/red',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/red' } ) )
                  },
                  {
                      title: __( '赤太字', THEME_NAME ),
                      icon: 'editor-bold',
                      isActive: type === 'cocoon-blocks/bold-red',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/bold-red' } ) )
                  },
                  {
                      title: __( '青色', THEME_NAME ),
                      icon: 'editor-textcolor',
                      isActive: type === 'cocoon-blocks/blue',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/blue' } ) )
                  },
                  {
                      title: __( '青太字', THEME_NAME ),
                      icon: 'editor-bold',
                      isActive: type === 'cocoon-blocks/bold-blue',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/bold-blue' } ) )
                  },
                  {
                      title: __( '緑色', THEME_NAME ),
                      icon: 'editor-textcolor',
                      isActive: type === 'cocoon-blocks/green',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/green' } ) )
                  },
                  {
                      title: __( '緑太字', THEME_NAME ),
                      icon: 'editor-bold',
                      isActive: type === 'cocoon-blocks/bold-green',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/bold-green' } ) )
                  },
                  {
                      title: __( '打ち消し線（訂正）', THEME_NAME ),
                      icon: 'minus',
                      isActive: type === 'cocoon-blocks/strike',
                      onClick: () => onChange( toggleFormat( value, { type: 'cocoon-blocks/strike' } ) )
                  },
              ] }
          />
          </Toolbar>
        </BlockControls>
      </Fragment>
    );
  },
} );