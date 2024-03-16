create table admin(
	admin_id int auto_increment primary key,
	admin_email varchar(50) not null unique,
	admin_pwd varchar(50) not null,
	admin_name varchar(100) not null,
	admin_phone varchar(20) not null
);

insert into admin(admin_email, admin_pwd, admin_name, admin_phone) values('admin@gmail.com','admin','Tej Koli', '7447371278');

create table customer(
	cust_id int auto_increment primary key,
	cust_email varchar(50) not null unique,
	cust_pwd varchar(50) not null,
	cust_name varchar(100) not null,
	cust_addr varchar(255) not null,
	cust_phone varchar(10) not null
);

insert into customer(cust_email, cust_pwd, cust_name, cust_addr, cust_phone) values
('iampmofindia@gmail.com', 'Test2024', 'Narendra Modi', '228, Ambedkar Road, Opp Gloria Church, Byculla, Mumbai', '9823374979'),
('iamgodofcricket@gmail.com', 'Test2024', 'Sachin Tendulkar', 'Bolinj Naka, Sakharam Baba Sankul, Virar, Mumbai', '8698958117'),
('dreamgirl@gmail.com', 'Test2024', 'Hema Malini', '5-1-611/b6, Troop Bazar, Hyderabad', '7898675688'),
('pt2003@gmail.com', 'Test2024', 'Pratik Thakare', '23.old12, Narayana Mudali St, Sowcarpet, Chennai', '7878990089'),
('avani.more@gmail.com', 'Test2024', 'Avani More', '2nd Floor,77, Sp-3, 102 Kailash Indl Complex, E L B S Road, Gpo, Vikhroli, Mumbai', '6777897865'),
('desaimangoes@gmail.com', 'Test2024', 'Ameya Desai', '15, 8th Floor, Apeejay House, Park Street, Kolkata', '9098224545'),
('hd.shinde@gmail.com', 'Test2024', 'Hanumant Shinde', 'Satyam Industrial Estate, Aasmant Apts, Sr.No.1/4, Near, Opp. SNDT College, Pune, Maharashtra 411004, India', '9822290095');

create table vendor(
	v_id int auto_increment primary key,
	v_name varchar(100) not null,
	v_contact_person varchar(100) not null,
	v_address varchar(100) not null,
	v_phone varchar(10) not null,
	v_email varchar(50) not null,
	v_password varchar(30) not null,
	v_pic varchar(100) not null,
	v_type varchar(30) not null,
	v_website varchar(100) not null,
	v_description text not null,
	v_status int default 0
);

insert into vendor
(v_name, 						v_contact_person, 				v_address, 																							v_phone, 		v_email, 					v_password, 	v_pic, 					v_type, 		v_website, 				v_description) values
('Jagdamba Caterers',			'Atal Bhanudas Priyavardhan',	'551 - Main Bazar Siru Chowk Ulhasnagar, Mumbai,Pune,421002,India',									'9823374979',	'jagdamba@gmail.com',		'Test@2024',	'vendors/vendor1.jpg',	'Caterer',		'jagdamba-caterers.in',	"Jagdamba caterers one of the best caterers in pimpri Chinchwad we provide Catering service more than 7 years. Birthday party, house warming, wedding, small party, big party or any kinds of events catering service. We have never compromised on the quality and the service provided to the customer. We believe in keeping the customer happy and providing them with products at a very competent price."),
('Aditya Caterers',				'Aditya Thakare',				'68  Kamdhenu Shpg Lokhandwala Opp. Pradeep Jewellers Andheri , Mumbai,Pune,400058,India',			'8823374979',	'aditya2023@gmail.com',		'Test@2024',	'vendors/vendor2.jpg',	'Caterer',		'aditya-caterers.com',	"We do excellent catering arrangements for your events. We provide generous portions and all items are fresh and super delicious. Please recommend us to your friends and family."),
('Mugdha Caterers',				'Nikhil Shahane',				'144  Unique House Cardinal Gracious Rdchakala Andheri , Mumbai,Pune,400099,India',					'7823374979',	'nikhil19986@gmail.com',	'Test@2024',	'vendors/vendor3.jpg',	'Caterer',		'mugdha-events.com',	"One of best catering services. We provide very delicious food. We provide very high quality food and also serve in very good taste. There is no second choice if you want hygiene, quality and taste at one place."),
('IDRIS CATERERS',				'Amit Paste',					'Malwani Malad W, Mumbai,Pune,400095,India',														'9823374999',	'paste.amit@gmail.com',		'Test@2024',	'vendors/vendor4.jpg',	'Caterer',		'idris.com',			"Best Veg And Non-veg Items in pune. You will love the taste and quantitiy which we provide. Our staff is very polite and we deliver on time."),
('Krishnai Catering',			'Rishabh Chugh',				'Babu Mistry Commercial Station Road Opp. Meera Jewellers Bhayander , Mumbai,Pune,401101,India',	'9823374979',	'bitsgoa@gmail.com',		'Test@2024',	'vendors/vendor5.jpg',	'Caterer',		'krisnai-services.com',	"The provide awesome food. We maintain proper hygiene and quality. We provide prompt on time service. Please recommend Krishnai catering services."),
('Maithili Photo Studio',		'Avani More',					'89  Bubna House Anand Road Malad , Mumbai,Pune,400064,India',										'9822274979',	'iamfanofbts@gmail.com',	'Test@2024',	'vendors/vendor6.jpg',	'Photographer',	'maithali-events.com',	"Maithali Photography is one of the most renowned professional photographers in Pimpri Chinchwad, providing wedding and pre-wedding shoots for their clients. They offer services at a much affordable rate and aim at satisfying their customers with a memorable experience. Experienced and Professional wedding photographers help their clients in managing and guiding their photoshoots according to their desired theme."),
('Sanjeev Photo Studio',		'Tanishka Bhosale',				'Akruti Business Port Rd 13 Midc Andheri , Mumbai,Pune,400093,India',								'9825574979',	'tannu2003@gmail.com',		'Test@2024',	'vendors/vendor7.jpg',	'Photographer',	'sanjeev-studio.com',	"Sanjeev Photo Studio is a professional Photographer in Pimpri Chinchwad among other photographers that provide a memorable experience among their clients. According to Photography they capture the best candid moments of the wedding and make it a forever memory that can be preserved. They are located in the heart of the city which makes them reachable via available modes of transport. They aim to provide a budget-friendly package and satisfy their clients with professionalism."),
('Sanjay Photography',			'Amit Jagwani',					'20 - Bank Street, Hyderabad,Pune,500001,India',													'9823374979',	'jaggu.pimpri@gmail.com',	'Test@2024',	'vendors/vendor8.jpg',	'Photographer',	'sanjayphotography.in',	"One of the well-known professional Photographers in Pimpri Chinchwad is The Sunil Kumbhar Photography. Considering the clients’ needs, they have the best packages to give them a memorable experience on a budget. They take pride in being a company with many happy customers and serving them with amazing services. They are easy to locate and are very well connected to the city and deemed to be one of the promising photographers in city. They have the best and experience team of photographers to serve their clients."),
('SABRI PHOTO SERVICES',		'Vijay Panwar',					'138  Nirman Estate Link Road Behind Fire Brigade Chincholi Malad , Mumbai,Pune,400064,India',		'7723374979',	'vp.singh@gmail.com',		'Test@2024',	'vendors/vendor9.jpg',	'Photographer',	'sabri-studio.in',		"Providing a memorable professional photography experience is what Pritam kamble photography in Pimpri Chinchwad is known for quality photography. They specialize in capturing the most candid memories and framing them. They gives the best packages for weddings, pre-wedding, and reception to their clients according to their needs and demands. Their photographers are extremely knowledgeable and have years of experience in this field so that they can provide their clients with the best possible service and experience."),
('Uttam Photo Studio',			'Namita Desai',					'53 /a Mukharjee Park Extension C K Road Tilak Nagar, Delhi,Pune,110018,India',						'9823364979',	'desai.mangoes@gmail.com',	'Test@2024',	'vendors/vendor10.jpg',	'Photographer',	'uttam-photos.com',		"Driven by a passion for transforming your moments into sweet memories through their vision. Their team of professional photographers deliver the picture-perfect experience that would make your event extraordinarily superb. Perfect Blink Photography is a well-recognized professional Photographer in Pimpri Chinchwad, providing shoots to their clients. They are experienced professionals, with more than 10 years of experience in Photography and successfully completed more than 150 shoots all around the Pimpri Chinchwad."),
('Badamikar Decorators',		'Pratiksha Thorat',				'7 nd Floor Singapori Bldg  J S S Road Kalbadevi, Mumbai,Pune,400002,India',						'7823374979',	'pt.2023@gmail.com',		'Test@2024',	'vendors/vendor11.jpg',	'Decorator',	'we-badamikars.com',	"If you’re on a budget but still desire a luxurious wedding, then Rish Events is a go to option for you. Wedding decorators in India, especially ones based in Mumbai can give you humongous ceremonies,but at a price. Whereas, this company  although giving you high quality decor helps with the price factor a lot. "),
('Sai Decorators',				'Mrugesh Walimbe',				'40  Ghanshyam Nagar Nr Rly Stn J A Rd Kandivli, Mumbai,Pune,400067,India',							'9823375979',	'mrugya.w@gmail.com',		'Test@2024',	'vendors/vendor12.jpg',	'Decorator',	'sai-caterers.in',		"As the name suggests they are there to make the most out of a wedding event. Expert competence in wedding decor ideas, with extra emphasis on Indian wedding mandap ideas, they have about 10 years of experience in the industry, and that indeed in one of the pointers one should keep in mind when looking for decorators."),
('A K Decoration Services',		'Yogesh Amrutkar',				'Kantilal Terrace Station Road Kandivali , Mumbai,Pune,400067,India',								'9824374999',	'yogi1977@gmail.com',		'Test@2024',	'vendors/vendor13.jpg',	'Decorator',	'ak-catering.com',		"A touch of distinctive personalization can make your special day the best. Established in the year 2000, this company holds the best floral themed weddings. Be it a Sangeet, or just a basic venue decoration, they personalise for each particular customer. "),
('New Taj Decorators',			'Anita Shinde',					'49 st Floor Pradhan Bldg Nr Thane Rly Stn Thane , Mumbai,Pune,400602,India',						'6823375979',	'iammrsshinde@gmail.com',	'Test@2024',	'vendors/vendor14.jpg',	'Decorator',	'taj-catering.in',		"The assurance they give you about their wedding decor, come from the confidence of their previous assignments. That number is not ten, or twenty or even thirty but over three hundred and still counting. You do not have to worry about a desi touch in your decorations, as they make it happen by properly embracing the cultural magnificence."),
('Kutbi Decorators',			'Aditi Rane',					'39 Lakshman Commercial Street, Bangalore,Pune,560001,India',										'9825575979',	'weranes@gmail.com',		'Test@2024',	'vendors/vendor15.jpg',	'Decorator',	'kutbi-pune.com',		"Any wedding reception accumulated by them has a touch of professionalism associated with a well planned wedding theme. Here, every event is given special attention for the decoration idea including  rental furniture, crockery, centrepiece, and even card decoration.");

create table planner(
	planner_id int auto_increment primary key,
	planner_name varchar(100) not null,
	planner_address varchar(255) not null,
	planner_phone varchar(20) not null,
	planner_email varchar(50) not null,
	planner_pwd varchar(50) not null default 'Test@2023',
	planner_pic varchar(100) not null
);

insert into planner(planner_name, planner_address, planner_phone, planner_email, planner_pic) values
('Avinash Pawar','Room No 239-240, Krishi Bhawan, Dr Rajendra Prasad Road, Parliament Street, Delhi','9823374978','avi.pawar@gmail.com','planners/planner1.jpg'),
('Sarang Joshi','401, Dol Bin Shir, 69-71 Ghoga St, Opp Siddhart College, Fort, Mumbai','9825574978','joshi.sarang@gmail.com','planners/planner2.jpg'),
('Prathamesh Deshpande','18, Lohar Bhavan, P D Mello Road, Masjid Bunder (East), Mumbai','9823377978','pd.2023@gmail.com','planners/planner3.jpg'),
('Madhuri Dixit','5-142/3, Fathenagar, Hyderabad','9823374999','me.madhuri@gmail.com','planners/planner4.jpg'),
('Abhishek Mehta','1st Floor, 30 V V Chandan Street, Masjid Bunder (West), Mumbai','7823374978','ilovemaths@gmail.com','planners/planner5.jpg'),
('Payal Vispute','4, F Type No 1, Sector 4, Belapur(CBD), Mumbai','6823374978','iamdaughterofvispute@gmail.com','planners/planner6.jpg'),
('Prachi Jog','Shop No.12, Phase Ii, L-market Shopping Cmplx, Sec 8, Nerul, Navi Mumbai','6833374978','jog1998@gmail.com','planners/planner7.jpg'),
('Amit Shinde','Old No X-17,new No 30, Raja St Extension, Mandaveli, Chennai','7823377978','shindeamit1998@gmail.com','planners/planner8.jpg'),
('Rupesh Bafna','1489/7/8, Mkk Road, Mariyappana Palya, Bengalore','9823377778','bafnaacademy@gmail.com','planners/planner9.jpg'),
('Beena Vaswani','D 53, Part 2, Greater Kailash, Delhi','8883374978','beena.nagdev@gmail.com','planners/planner10.jpg');

create table venue(
	venue_id int auto_increment primary key,
	venue_name varchar(100) not null,
	venue_contact_person varchar(100) not null,
	venue_address varchar(255) not null,
	venue_phone varchar(20) not null,
	venue_email varchar(50) not null,
	venue_rate float not null,
	venue_img varchar(50) not null,
	venue_lat float,
	venue_long float
);

insert into venue(venue_name, venue_contact_person, venue_address, venue_phone, venue_email, venue_rate, venue_img, venue_lat, venue_long) values
('Della Resorts','Chandrakant Shinde',"Della Enclave Rd, Kune Village, Khandala, Lonavala, Kune N.m., Maharashtra 410401",'9823678990','customer@dellas.com',250000,'venues/venue1.jpg',18.874891919966565,73.54286534135741),
('JK Banquets','Amit Shah',"Ground Industry Manor, 1/B, Appasaheb Marathe Marg, Prabhadevi, Mumbai, Maharashtra 400025",'7678895678','jkhall@gmail.com',125000,'venues/venue2.jpg',19.1379788,72.9232823),
('Aryan Banquet Hall','Dilip Oak',"Shankar Sheth Rd, Charni Road East, Bhatwadi, Girgaon, Mumbai, Maharashtra 400004",'8678895668','aryans@gmail.com',111000,'venues/venue3.jpg',18.8965931,72.79479789999999),
('Indraprastha Multipurpose Halls','Saurabh Hirlekar',"Senapati Bapat Rd, Range Hill Corner, Shivajinagar, Pune, Maharashtra 411016",'8678895666','indraprastha@gmail.com',175000,'venues/venue4.jpg',18.5661678,73.9457729),
('Seasons Banquets Akurdi','Rohit Kadam',"Gems Crystal, Plot no 92, Chinchwad - Akurdi Link Road, OLD PUNE MUMBAI HWY Above Pantaloons, 3rd and 4th floor, Pimpri-Chinchwad, Maharashtra 411019",'6668895678','customer@seasons.com',180000,'venues/venue5.jpg',18.667175399999998,73.8490466),
('Mantraa Banquet Hall','Sonali Joshi',"Oppo, Sai Sayaji Apartment, Police Station, Paud Rd, Lokmanya Colony, Kothrud, Pune, Maharashtra 411038",'7898786756','admin@mantraa.com',210000,'venues/venue6.jpg',18.495084,73.7323187),
('Gayatri Vihar Sagar','Priyanka Jagdale',"Gayatri Vihar Sagar, Gate No.4, Palace Grounds, Near Mekhri Circle, Bengaluru, Karnataka 560080",'7866232345','gayatri@gmail.com',245000,'venues/venue7.jpg',13.114765700000001,77.63918),
('Safina Banquets','Ashok Mankar',"84/85, Infantry Rd, Tasker Town, Shivaji Nagar, Bengaluru, Karnataka 560001",'6789786783','safina2023@gmail.com',125000,'venues/venue8.jpg',12.9044938,77.54382530000001),
('Sunshine Marriage & Party Hall','Mahesh Pandkar',"P673+MHJ, Dheer pur, Om Mandir Marg, Nirankari Colony, Mukherjee Nagar, Delhi, 110009",'6788787866','admin@sunshine.in',185000,'venues/venue9.jpg',28.812050299999996,77.31853389999999),
('AZALEA Banquet','Shriswaroop Joshi',"C 162, Naraina Industrial Area, Phase-I, Industrial Area Phase I, Block C, Naraina Industrial Area Phase 1, Naraina, New Delhi, Delhi 110028",'9822234343','azalea@gmail.com',210000,'venues/venue10.jpg',28.5269868,77.0576867),
('Mayor Ramanathan Centre','Sameer Vaidya',"75/2, Santhome High Rd, Mandavelipakkam, Raja Annamalai Puram, Chennai, Tamil Nadu 600028",'7865656666','customer@ramanathan.com',85000,'venues/venue11.jpg',13.097166999999999,80.2784087),
('S.P.S. Marriage Hall','Sarang Kulkarni',"19/1, Abdul Razzak St, Saidapet, Chennai, Tamil Nadu 600015",'8777555454','sps2023@gmail.com',125000,'venues/venue12.jpg',12.894858,80.1442656),
('Ashiana Banquet And Conference','Depali Patekar',"8-2-590-11 Road No. 1 Opp : Taj Krishna, Banjara Hills, Hyderabad, Telangana 500034",'6756566565','ashiana@gmail.com',175000,'venues/venue13.jpg',17.3392087,78.37181160000002),
('Nimantran Palace','Rajeev Sardesai',"Nagole X Road, 4-26/1, Inner Ring Rd, near Swathi Tiffins, Nagole, Hyderabad, Telangana 500035",'9877756676','customer@nimantran.in',165000,'venues/venue14.jpg',17.4607079,78.5678102),
('Severina Gardens','Amol Hiremath',"1/103 Severina Gardens, Xelpem, Duler, Mapusa, Goa 403507",'9877756676','customer-care@severina.com',285000,'venues/venue15.jpg',15.630210300000002,74.19206059999999)

create table gallery(
	g_id int auto_increment primary key,
	g_img varchar(100) not null,
	v_id int references vendor(v_id) on delete cascade
);

create table thali(
	t_id int auto_increment primary key,
	t_name varchar(100) not null,
	t_type varchar(20) not null,
	t_rate float not null,
	t_img varchar(50) not null,
	v_id int references vendor(v_id) on delete cascade
);

create table booking(
	booking_no serial primary key,
	booking_date date not null,
	event_date date not null,
	event_name text not null,
	venue_id int references venue(venue_id),
	decorator_id int references vendor(v_id),
	caterer_id int references vendor(v_id),
	p_id int references vendor(v_id),
	planner_id int references planner(planner_id),
	t_id int references thali(t_id),
	no_of_person int not null,
	cust_id text references customer(cust_id),
	status text	
);

create table bill(
	bill_no int auto_increment primary key,
	bill_date date not null,
	booking_no int references booking(booking_no),
	venue_cost float not null,
	decorator_cost float not null,
	caterer_cost float not null,
	photographer_cost float not null,
	planner_cost float not null,
	total_amt float not null,
	payment_mode varchar(30),
	trn_no varchar(20) not null default '-',
	status varchar(20) not null default 'Pending'
);

create table feedback(
	f_id int auto_increment primary key,
	f_date date,
	f_by varchar(50),
	f_msg text
);



