import { Component } from "react";
import PropertiesService from "../../Services/PropertiesService";

class PropertyjobsCreate extends Component {

    constructor(props) {
        super(props);

        this.state = {
            properties: [],
            property_id: '',
            jobsummary: '',
            jobdescription: '',
            firstname: '',
            lastname: '',
        }

        //binding
        this.handlePropertyChange = this.handlePropertyChange.bind(this);
        this.handleJobsummaryChange = this.handleJobsummaryChange.bind(this);
        this.handleJobdescriptionChange = this.handleJobdescriptionChange.bind(this);
        this.handleFirstnameChange = this.handleFirstnameChange.bind(this);
        this.handleLastnameChange = this.handleLastnameChange.bind(this);

        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handlePropertyChange(event) {
        this.setState({property_id: event.target.value })
    }

    handleJobsummaryChange(event) {
        this.setState({jobsummary: event.target.value })
    }

    handleJobdescriptionChange(event) {
        this.setState({jobdescription: event.target.value })
    }

    handleFirstnameChange(event) {
        this.setState({firstname: event.target.value })
    }

    handleLastnameChange(event) {
        this.setState({lastname: event.target.value })
    }

    handleSubmit(event) {
        event.preventDefault();

        axios.post('/api/propertyjobs', {
            property_id: this.state.property_id,
            jobsummary: this.state.jobsummary,
            jobdescription: this.state.jobdescription,
            firstname: this.state.firstname,
            lastname: this.state.lastname,
        }).then(response => console.log(response.data));
    }

    renderProperties() {
        const properties = this.state.properties.data.map(property =>
            <option key={property.id} value={property.id}>{property.name}</option>
        );

        return (
            <select value={this.state.property_id} onChange={this.handlePropertyChange} className="form-control" id="property_id">>
                { properties }
            </select>
        )
    }

    componentDidMount() {
        PropertiesService.getAll()
            .then(response => this.setState( { properties: response.data}))
    }

    render() {
        if(!('data' in this.state.properties)) return;
        return (
            <div className="container">
                <form onSubmit={this.handleSubmit} className="col-md-8 offset-md-2">
                    <h3>Add job to property</h3>
                    <div className="form-group table col-sm">
                        <label htmlFor="property_id">Select Property</label>
                        { this.renderProperties() }
                    </div>
                    <div className="form-group table">
                        <label htmlFor="jobsummary">Job Summary (max 150 characters)</label>
                        <input value={this.state.jobsummary} onChange={this.handleJobsummaryChange} type="text" className="form-control" id="jobsummary"
                               placeholder="job summary goes here" maxLength="150" />
                    </div>
                    <div className="form-group table">
                        <label htmlFor="jobdescription">Job Description (max 500 characters)</label>
                        <textarea value={this.state.jobdescription} onChange={this.handleJobdescriptionChange} className="form-control col-xs-3" id="jobdescription" rows="3"></textarea>
                    </div>
                    <div className="form-group row table">
                        <div className="col">
                            <label htmlFor="firstname">First name</label>
                            <input value={this.state.firstname} onChange={this.handleFirstnameChange} type="text" className="form-control" id="firstname" placeholder="First name" />
                        </div>
                        <div className="col">
                            <label htmlFor="lastname">Last name</label>
                            <input value={this.state.lastname} onChange={this.handleLastnameChange} type="text" className="form-control" id="lastname" placeholder="Last name" />
                        </div>
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
        )
    }
}

export default PropertyjobsCreate;
