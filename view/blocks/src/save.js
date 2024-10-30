import { useBlockProps, RichText } from '@wordpress/block-editor';
import classnames from 'classnames';
const agentImage = require( './images/user.jpg' );

export default function save( { attributes } ) {
	const {
		buttonSize,
		borderRadius,
		buttonType,
		text,
		info,
		title,
		online,
		offline,
		textAlignment,
		visibility,
		border,
		iconTarget,
		imageUrl,
		emailInput,
		ccEmailInput,
		bccEmailInput,
		subject,
		bodyText,
		timeZone,
		mondayStart,
		mondayEnd,
		tuesdayStart,
		tuesdayEnd,
		wednesdayStart,
		wednesdayEnd,
		thursdayStart,
		thursdayEnd,
		fridayStart,
		fridayEnd,
		saturdayStart,
		saturdayEnd,
		sundayStart,
		sundayEnd,
	} = attributes;
	let subjectText = encodeURIComponent( subject );
	let bodyTexts = encodeURIComponent( bodyText );
	const textClasses = classnames( `mcButtons-align-${ textAlignment }` );

	const basicBtn = classnames( `ctm-button-4 ctm-btn-bg mailtoui` );
	const classes = classnames( `mcButtons ctm-button-4 ctm-btn-bg` );
	return (
		<>
			{ buttonType === 'basic-button' ? (
				<div className={ `button-wrapper ${ textClasses }` }>
					<a
						{ ...useBlockProps.save( {
							className: `${ basicBtn } ${ buttonSize } ${ borderRadius } ${ visibility } ${ border }`,
						} ) }
						href={ `${
							emailInput !== '' && `mailto:${ emailInput }`
						}${ subject !== '' && `?subject=${ subjectText }` }${
							ccEmailInput !== '' && `&cc=${ ccEmailInput }`
						}${
							bccEmailInput !== '' && `&bcc=${ bccEmailInput }`
						}${ bodyTexts !== '' && `&body=${ bodyTexts }` }` }
					>
						{ iconTarget && (
							<span className="dashicons dashicons-email"></span>
						) }
						<RichText.Content tagName="span" value={ text } />
					</a>
				</div>
			) : (
				<div className={ `button-wrapper ${ textClasses }` }>
					<button
						{ ...useBlockProps.save( {
							className: `${ classes } ${ buttonSize } ${ borderRadius } ${ visibility }`,
						} ) }
						data-ctmTime={ `{ "monday":"${ mondayStart }-${ mondayEnd }", "tuesday":"${ tuesdayStart }-${ tuesdayEnd }", "wednesday":"${ wednesdayStart }-${ wednesdayEnd }", "thursday":"${ thursdayStart }-${ thursdayEnd }", "friday":"${ fridayStart }-${ fridayEnd }", "saturday":"${ saturdayStart }-${ saturdayEnd }", "sunday":"${ sundayStart }-${ sundayEnd }" }` }
						data-timezone={ timeZone }
					>
						<img
							src={ imageUrl ? imageUrl : agentImage }
							alt="agent"
						/>
						<div className="info-wrapper">
							<RichText.Content
								value={ info }
								tagName="p"
								className="info"
							/>
							<RichText.Content
								value={ title }
								tagName="p"
								className="title"
							/>
							<RichText.Content
								value={ online }
								tagName="p"
								className="online"
							/>
							<RichText.Content
								value={ offline }
								tagName="p"
								className="offline"
							/>
						</div>
						<a className='mailtoui'
							href={ `${
								emailInput !== '' && `mailto:${ emailInput }`
							}${
								subject !== '' && `?subject=${ subjectText }`
							}${
								ccEmailInput !== '' && `&cc=${ ccEmailInput }`
							}${
								bccEmailInput !== '' &&
								`&bcc=${ bccEmailInput }`
							}${ bodyTexts !== '' && `&body=${ bodyTexts }` }` }
						></a>
					</button>
				</div>
			) }
		</>
	);
}
