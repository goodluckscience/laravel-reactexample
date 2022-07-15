import { Component } from "react";

class PropertyjobsIndex extends Component {

    constructor(props) {
        super(props);

        this.state = {
            propertyjobs: []

        }
    }

    fetchPropertyjobs(page = 1) {
        axios.get('/api/propertyjobs', { params: { page } })
            .then(response => this.setState( { propertyjobs: response.data}))
    }

    pageChanged(url) {
        const fullUrl = new URL(url);
        const page = fullUrl.searchParams.get('page');
        this.fetchPropertyjobs(page);
    }

    componentDidMount() {
        this.fetchPropertyjobs()
    }

    renderPropertyjobs() {
        return this.state.propertyjobs.data.map(propertyjob => <tr key={propertyjob.id}>
            <td>{ propertyjob.id }</td>
            <td>{ propertyjob.summary }</td>
            <td>{ propertyjob.status }</td>
            <td>{ propertyjob.property.name }</td>
            <td>{ propertyjob.first_name + ' ' + propertyjob.last_name }</td>
        </tr>);
    }

    renderPaginatorLinks() {

        return (
            this.state.propertyjobs.meta.links.map((link, index) =>
                <button key={index} onClick={() => this.pageChanged(link.url)} dangerouslySetInnerHTML={{__html: link.label}} className="page-link page-item d-inline-block" />
            )
        );
    }

    renderPaginator() {
        return (
            <div>
                showing: { this.state.propertyjobs.meta.from }
                to { this.state.propertyjobs.meta.to }
                of { this.state.propertyjobs.meta.total } results
        </div>
        )
    }

    render() {
        if(!('data' in this.state.propertyjobs)) return;
        return (
            <div className="table-responsive">
                <table className="table  table-bordered">
                    <thead >
                    <tr>
                        <th>ID</th>
                        <th>Summary</th>
                        <th>Status</th>
                        <th>Property Name</th>
                        <th>Raised By</th>
                    </tr>
                    </thead>
                    <tbody>
                        { this.renderPropertyjobs() }
                    </tbody>
                </table>
                <div className="mt-4">
                    { this.renderPaginator() }
                </div>
                <div className="mt-4">
                    { this.renderPaginatorLinks() }
                </div>
            </div>
        );
    }
}

export default PropertyjobsIndex;
